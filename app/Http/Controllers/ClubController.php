<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Standings;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clubs = Club::all();
        return view('clubs.index', compact('clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('test');
        return view('clubs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'min:5', 'max:30'],
            'city' => ['required', 'string', 'max:50'],
            'coach' => ['string', 'max:50']
        ]);

        $club = Club::create($request->all());
        Standings::create([
            'club_id' => $club->id
        ]);
        return redirect()->route('clubs.index')->with('success', 'Berhasil menambahkan Klub');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function show(Club $club)
    {
        return view('clubs.detail', compact('club'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function edit(Club $club)
    {
        return view('clubs.edit', compact('club'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Club $club)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:5', 'max:30'],
            'city' => ['required', 'string', 'max:50'],
            'coach' => ['string', 'max:50']
        ]);

        $club->update($request->all());

        return redirect()->route('clubs.index')->with('success', 'Klub berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function destroy(Club $club)
    {
        $club->delete();
        return redirect()->route('clubs.index')->with('success', 'Klub berhasil dihapus');
    }
}
