<?php

namespace App\Http\Controllers;

use App\careers;
use App\nationalities;
use App\offers;
use App\recruitmentOffers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecruitmentOffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offer=recruitmentOffers::all();
      return view('offers_recruitment.offers_recruitment',compact('offer'));
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
        $nash =$request->nash;
        $typ =$request->emp_typ;
        $work =$request->work;
        $religion=$request->religion;
        $nash_typ= $nash.$typ.$work.$religion;
        $request->request->add(['nash_Duration' => $nash_typ]);

        $validatedData = $request->validate([
            'nash_Duration' => 'required|unique:recruitment_offers|max:255',

        ],[

            'nash_Duration.unique' =>' عرض  التوسط مسجل مسبقآ',
            'nash_Duration.required' =>'عرض التوسط  مطلوب ',

        ]);

        recruitmentOffers::create([


            'emp_typ' => $request->emp_typ,
            'nash' => $request->nash,
            'work' => $request->work,
            'religion' => $request->religion,
            'Age' => $request->Age,
            'emp_exp' => $request->emp_exp,
            'salary' => $request->salary,
            'cost2' => $request->cost2,
            'vat_cost' => $request->vat_cost,
            'outcost2' =>  $request->outcost2,
            'total_offer' => $request->total_offer,
            'nash_Duration' =>$nash_typ ,

            'Created_by' => Auth::user()->name,

        ]);




        session()->flash('Add', 'تم اضافة عرض توسط بنجاح');
        return redirect('/offers_recruitment');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\recruitmentOffers  $recruitmentOffers
     * @return \Illuminate\Http\Response
     */
    public function show(recruitmentOffers $recruitmentOffers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\recruitmentOffers  $recruitmentOffers
     * @return \Illuminate\Http\Response
     */
    public function edit(recruitmentOffers $recruitmentOffers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\recruitmentOffers  $recruitmentOffers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, recruitmentOffers $recruitmentOffers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\recruitmentOffers  $recruitmentOffers
     * @return \Illuminate\Http\Response
     */
    public function destroy(recruitmentOffers $recruitmentOffers)
    {
        //
    }
    public function add_recruitment()
    {
        $nationalities=nationalities::all();
        $careers=careers::all();
        return view('offers_recruitment.add_recruitment',compact('careers','nationalities'));
    }
    public function get_offer_rec($nash,$emp_typ,$Age,$religion,$emp_exp)
    {

        $products = DB::table("recruitment_offers")->where("nash", $nash)->where("emp_typ",$emp_typ)->where("Age", $Age)->where("religion",$religion)->where("emp_exp",$emp_exp)->pluck('work','id');

        return json_encode($products);

    }

    public function get_offer_rec_typ($nash,$emp_typ)
    {

        $products = DB::table("recruitment_offers")->where("nash", $nash)->where("emp_typ",$emp_typ)->pluck('work','id');

        return json_encode($products);

    }
    public function getdataoffer_value($id)
    {

        $products = DB::table("recruitment_offers")->where("id", $id)->first();

        return json_encode($products);

    }




}
