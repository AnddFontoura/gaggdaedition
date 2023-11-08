<?php

namespace App\Http\Controllers;

use App\Edition;
use Illuminate\Http\Request;

class EditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $editions = Edition::paginate();

        return view('admin.edition.index', compact('editions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(int $id = null)
    {
        $edition = null;
        
        if ($id) {
            $edition = Edition::where('id', $id)->first();
        }
        
        return view('admin.edition.form', compact('edition'));
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
     * @param  \App\Edition  $edition
     * @return \Illuminate\Http\Response
     */
    public function show(Edition $edition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Edition  $edition
     * @return \Illuminate\Http\Response
     */
    public function edit(Edition $edition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Edition  $edition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Edition $edition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Edition  $edition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Edition $edition)
    {
        //
    }
}
