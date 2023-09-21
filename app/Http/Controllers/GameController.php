<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Club;
use App\Models\Standings;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::with('homeTeam', 'awayTeam')
        ->orderBy('match_date', 'asc')
        ->get();
        return view('games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clubs = Club::all();
        return view('games.create', compact('clubs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'home_team' => 'required|different:away_team',
                'away_team' => 'required',
                'match_date' => 'required|date',
            ]);

            $existingGame = Game::where('home_team', $request->home_team)
                ->where('away_team', $request->away_team)
                ->first();

            if ($existingGame) {
                return redirect()->back()->with('error', 'Pertandingan dengan data yang sama sudah ada.');
            }

            Game::create($request->all());

            return redirect()->route('games.index')->with('success', 'Pertandingan berhasil disimpan.');
        } catch(\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        $game = Game::with('homeTeam', 'awayTeam')->find($game->id);
        return view('games.detail', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        $clubs = Club::all();
        $game = Game::with('homeTeam', 'awayTeam')->find($game->id);
        return view('games.edit', compact('game', 'clubs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        try {
            $request->validate([
                'home_team' => 'required|different:away_team',
                'away_team' => 'required',
                'home_score' => 'required|integer',
                'away_score' => 'required|integer',
                'status' => 'required|string'
            ]);

            $game->update($request->all());

            if($request->status == 'done') {
                $home_standings = Standings::where('club_id', $request->home_team)->first();
                $away_standings = Standings::where('club_id', $request->away_team)->first();

                $home_standings->increment('play');
                $away_standings->increment('play');

                $home_standings->goal_win = $home_standings->goal_win + $request->home_score;
                $home_standings->goal_lose = $home_standings->goal_lose + $request->away_score;

                $away_standings->goal_win = $away_standings->goal_win + $request->away_score;
                $away_standings->goal_lose = $away_standings->goal_lose + $request->home_score;

                if ($request->home_score > $request->away_score) {
                    $home_standings->win++;
                    $away_standings->lose++;
                    $home_standings->point += 3;
                } elseif ($request->home_score < $request->away_score) {
                    $home_standings->lose++;
                    $away_standings->win++;
                    $away_standings->point += 3;
                } else {
                    $home_standings->draw++;
                    $away_standings->draw++;
                    $home_standings->point++;
                    $away_standings->point++;
                }

                $home_standings->save();
                $away_standings->save();
            }

            return redirect()->route('games.index')->with('success', 'Pertandingan berhasil diperbarui.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->route('games.index')->with('success', 'Pertandingan berhasil dihapus.');
    }
}
