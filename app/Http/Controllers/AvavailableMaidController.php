<?php

namespace App\Http\Controllers;

use App\avavailable_maid;
use App\maids;
use Illuminate\Http\Request;

class AvavailableMaidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maids=maids::select('*')->where('connected',0)->orderBy('id', 'desc')->paginate(7);
        $maids_count=maids::select('*')->where('connected',0)->get();
        $maids_count2=$maids_count->count();
        return view('maids.avavailable_maid',compact('maids','maids_count2'));
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
     * @param  \App\avavailable_maid  $avavailable_maid
     * @return \Illuminate\Http\Response
     */
    public function show(avavailable_maid $avavailable_maid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\avavailable_maid  $avavailable_maid
     * @return \Illuminate\Http\Response
     */
    public function edit(avavailable_maid $avavailable_maid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\avavailable_maid  $avavailable_maid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, avavailable_maid $avavailable_maid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\avavailable_maid  $avavailable_maid
     * @return \Illuminate\Http\Response
     */
    public function destroy(avavailable_maid $avavailable_maid)
    {
        //
    }
}
