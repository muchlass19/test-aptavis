<?php

namespace App\Http\Controllers;

use App\Models\Standings;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StandingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $standings = Standings::with('clubs')
        ->selectRaw('*, goal_win - goal_lose as point_difference')
        ->orderByDesc('point')
        ->orderByDesc('point_difference')
        ->orderByDesc('win')
        ->orderByDesc('goal_win')
        ->get();
        return view('standings.index', compact('standings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Standings  $standings
     * @return \Illuminate\Http\Response
     */
    public function show(Standings $standings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Standings  $standings
     * @return \Illuminate\Http\Response
     */
    public function edit(Standings $standings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Standings  $standings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Standings $standings)
    {
        $standings = Standings::all();
        DB::table('games')->truncate();

        foreach($standings as $standing) {
            $standing->update([
                'play' => 0,
                'point' => 0,
                'win' => 0,
                'draw' => 0,
                'lose' => 0,
                'goal_win' => 0,
                'goal_lose' => 0
            ]);
        }

        return redirect()->route('standings.index')->with('success', 'Klasemen berhasil di-reset.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Standings  $standings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Standings $standings)
    {
        //
    }
}
