<?php

namespace App\Http\Controllers;

use App\Matches;
use Illuminate\Http\Request;

class MatchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matches = Matches::where('type', 'GROUP')
            ->orderBy('match_number', 'asc')
            ->get();

        return view('match.index', compact('matches'));
    }

    public function octaves()
    {
        $matches = Matches::where('type', 'OCTAVES')
            ->orderBy('match_number', 'asc')
            ->get();

        return view('match.octaves', compact('matches'));
    }

    public function quarters()
    {
        $matches = Matches::where('type', 'QUARTER')
            ->orderBy('match_number', 'asc')
            ->get();

        return view('match.quarters', compact('matches'));
    }

    public function semis()
    {
        $matches = Matches::where('type', 'SEMI')
            ->orderBy('match_number', 'asc')
            ->get();

        return view('match.semis', compact('matches'));
    }

    public function finals()
    {
        $matches = Matches::where('type', 'FINAL')
            ->orderBy('match_number', 'asc')
            ->get();

        return view('match.finals', compact('matches'));
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
     * @param  \App\Matches  $matches
     * @return \Illuminate\Http\Response
     */
    public function show(Matches $matches)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Matches  $matches
     * @return \Illuminate\Http\Response
     */
    public function edit(Matches $matches)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Matches  $matches
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matches $matches)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Matches  $matches
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matches $matches)
    {
        //
    }
}
