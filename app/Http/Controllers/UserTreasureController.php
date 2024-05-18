<?php

namespace App\Http\Controllers;

use App\user_treasure;
use Illuminate\Http\Request;

class UserTreasureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_treasures=user_treasure::all();
      return view('treasures.treasures',compact('user_treasures'));
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
     * @param  \App\user_treasure  $user_treasure
     * @return \Illuminate\Http\Response
     */
    public function show(user_treasure $user_treasure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user_treasure  $user_treasure
     * @return \Illuminate\Http\Response
     */
    public function edit(user_treasure $user_treasure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user_treasure  $user_treasure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user_treasure $user_treasure)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user_treasure  $user_treasure
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_treasure $user_treasure)
    {
        //
    }
}
