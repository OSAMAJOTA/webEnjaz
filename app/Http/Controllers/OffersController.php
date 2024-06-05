<?php

namespace App\Http\Controllers;

use App\careers;
use App\Durations;
use App\nationalities;
use App\offers;
use App\wakel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers=offers::all();
    return view('offers.offers',compact('offers'));
    }
    public function show_offer()
    {

        return view('offers.show_offer');
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

    public function addoffer()
    {
        $Durations=Durations::all();
        $nationalities=nationalities::all();
        $career=careers::all();
        return view('offers.add_offers',compact('career','nationalities','Durations'));
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
        $Duration =$request->Duration;
        $work =$request->work;

        $nash_Duration= $nash.$Duration.$work;
        $request->request->add(['nash_Duration' => $nash_Duration]);

        $validatedData = $request->validate([
            'nash_Duration' => 'required|unique:offers|max:255',

        ],[

            'nash_Duration.unique' =>' مدة التشغيل مسجل مسبقآ',
            'nash_Duration.required' =>'مدة التشغيل  مطلوب ',

        ]);


      if($request->active==1){
          $atv='مفعل';
      }else{
          $atv='غير مفعل';
      }


        offers::create([


            'nash' => $request->nash,
            'countss' => $request->countss,
            'tamin' => $request->tamin2,
            'work' => $request->work,
            'cost' => $request->cost2,
            'Duration' => $request->Duration,
            'is_work' => $request->is_work,
            'vat_cost' => $request->vat_cost,
            'emp_salary' => $request->emp_salary,
            'Total' => $request->Total,
            'nash_Duration' =>  $nash_Duration,
            'active' =>$atv,


            'Created_by' => Auth::user()->name,

        ]);




        session()->flash('Add', 'تم اضافة عرض تشغيل بنجاح');
        return redirect('/offers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\offers  $offers
     * @return \Illuminate\Http\Response
     */
    public function show(offers $offers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\offers  $offers
     * @return \Illuminate\Http\Response
     */
    public function edit(offers $offers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\offers  $offers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, offers $offers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\offers  $offers
     * @return \Illuminate\Http\Response
     */
    public function destroy(offers $offers)
    {
        //
    }
}
