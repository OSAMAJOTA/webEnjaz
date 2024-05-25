<?php

namespace App\Http\Controllers;

use App\citys;
use App\nationalities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
$citys=citys::all();
return view('citys.citys',compact('citys'));
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
        $validatedData = $request->validate([
            'citys_name' => 'required|unique:citys|max:255',

        ],[
            'citys_name.required' =>'الرجاء ادخال اسم الدينة',
            'citys_name.unique' =>'اسم المدينة مسجل مسبقآ',


        ]);

        citys::create([
            'citys_name' => $request->citys_name,
            'Created_by' => (Auth::user()->name),

        ]);
        session()->flash('Add', 'تم اضافة مدينة بنجاح ');
        return redirect('/citys');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\citys  $citys
     * @return \Illuminate\Http\Response
     */
    public function show(citys $citys)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\citys  $citys
     * @return \Illuminate\Http\Response
     */
    public function edit(citys $citys)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\citys  $citys
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, citys $citys)
    {
        $id = $request->id;

        $this->validate($request, [

            'citys_name' => 'required|unique:citys|max:255',

        ],[

            'citys_name.required' =>'الرجاء ادخال اسم المدينة',
            'citys_name.unique' =>'اسم المدينة مسجل مسبقآ',

        ]);

        $citys = citys::find($id);
        $citys->update([
            'citys_name' => $request->citys_name,

        ]);

        session()->flash('edit','تم تعديل المدينة بنجاج');
        return redirect('/citys');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\citys  $citys
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        citys::find($id)->delete();
        session()->flash('delete','تم حذف المدينة بنجاح');
        return redirect('/citys');
    }
}
