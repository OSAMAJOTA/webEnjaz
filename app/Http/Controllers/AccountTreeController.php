<?php

namespace App\Http\Controllers;

use App\accountTree;
use Illuminate\Http\Request;

class AccountTreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     return view('tree.tree');
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
     * @param  \App\accountTree  $accountTree
     * @return \Illuminate\Http\Response
     */
    public function show(accountTree $accountTree)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\accountTree  $accountTree
     * @return \Illuminate\Http\Response
     */
    public function edit(accountTree $accountTree)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\accountTree  $accountTree
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, accountTree $accountTree)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\accountTree  $accountTree
     * @return \Illuminate\Http\Response
     */
    public function destroy(accountTree $accountTree)
    {
        //
    }
}
