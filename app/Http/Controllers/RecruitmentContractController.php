<?php

namespace App\Http\Controllers;

use App\agents;
use App\careers;
use App\companys;
use App\nationalities;
use App\recruitmentContract;
use Illuminate\Http\Request;

class RecruitmentContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('recruitment.recruitment');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $nationalities=nationalities::all();
        $careers=careers::all();
        $companys=companys::all();
        $agents=agents::select('*')->where('id',$id)->first();
        return view('recruitment.recruitmentcont',compact('companys','agents','nationalities','careers'));
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
     * @param  \App\recruitmentContract  $recruitmentContract
     * @return \Illuminate\Http\Response
     */
    public function show(recruitmentContract $recruitmentContract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\recruitmentContract  $recruitmentContract
     * @return \Illuminate\Http\Response
     */
    public function edit(recruitmentContract $recruitmentContract)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\recruitmentContract  $recruitmentContract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, recruitmentContract $recruitmentContract)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\recruitmentContract  $recruitmentContract
     * @return \Illuminate\Http\Response
     */
    public function destroy(recruitmentContract $recruitmentContract)
    {
        //
    }
}
