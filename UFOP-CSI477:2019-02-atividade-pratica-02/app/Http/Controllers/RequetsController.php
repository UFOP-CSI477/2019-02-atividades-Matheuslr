<?php

namespace App\Http\Controllers;

use App\Requets;
use Illuminate\Http\Request;

class RequetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requets = Requets::orderBy('id')->get();

        // View -> apresentar
        return view('requets.index')
                ->with('requets', $requets);
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
     * @param  \App\Requets  $requets
     * @return \Illuminate\Http\Response
     */
    public function show(Requets $requets)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Requets  $requets
     * @return \Illuminate\Http\Response
     */
    public function edit(Requets $requets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Requets  $requets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requets $requets)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Requets  $requets
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requets $requets)
    {
        //
    }
}
