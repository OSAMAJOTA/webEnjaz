<?php

namespace App\Http\Controllers;

use App\agents;
use App\wakel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WakelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $wakel=wakel::paginate();
return view('wakel.wakel',compact('wakel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wakel.add_wakel');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        wakel::create([

            'wakel_name' => $request->wakel_name,
            'phone' => $request->phone,
            'add_ar' => $request->add_ar,
            'wakel_name_en' => $request->wakel_name_en,
            'phone2' => $request->phone2,
            'add_en' => $request->add_en,
            'login_name' => $request->login_name,

            'email' => $request->email,

            'company_name_ar' => $request->company_name_ar,


            'nash' => $request->nash,
            'wakel_type' => $request->wakel_type,
            'company_name_en' => $request->company_name_en,

            'wakel_id' => $request->wakel_id,



            'Created_by' => Auth::user()->name,

        ]);




        session()->flash('Add', 'تم اضافة وكيل بنجاح');
        return redirect('/wakel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\wakel  $wakel
     * @return \Illuminate\Http\Response
     */
    public function show(wakel $wakel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\wakel  $wakel
     * @return \Illuminate\Http\Response
     */
    public function edit(wakel $wakel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\wakel  $wakel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, wakel $wakel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\wakel  $wakel
     * @return \Illuminate\Http\Response
     */
    public function destroy(wakel $wakel)
    {
        //
    }
}
