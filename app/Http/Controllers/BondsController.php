<?php

namespace App\Http\Controllers;

use App\Bonds;
use Illuminate\Http\Request;

class BondsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('bonds.general_bonds');
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
     * @param  \App\Bonds  $bonds
     * @return \Illuminate\Http\Response
     */
    public function show(Bonds $bonds)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bonds  $bonds
     * @return \Illuminate\Http\Response
     */
    public function edit(Bonds $bonds)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bonds  $bonds
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bonds $bonds)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bonds  $bonds
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bonds $bonds)
    {
        //
    }
}
