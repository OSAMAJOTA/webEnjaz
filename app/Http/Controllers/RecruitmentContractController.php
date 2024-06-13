<?php

namespace App\Http\Controllers;

use App\agents;
use App\Bonds;
use App\careers;
use App\citys;
use App\companys;
use App\contract;
use App\contract_comment;
use App\nationalities;
use App\recruitment_comment;
use App\recruitmentContract;
use App\user_treasure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecruitmentContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recruitment= recruitmentContract::select('*')->orderBy('id', 'desc')->paginate(7);
        $recruitment_count=recruitmentContract::all();

        $contract_count2=$recruitment_count->count();
        return view('recruitment.recruitment',compact('recruitment','contract_count2'));
    }

    public function recruitment_comment(Request $Request )
    {
        recruitment_comment::create([
            'comment' => $Request->comment,
            'contract_id' => $Request->id,
            'Created_by' => (Auth::user()->name),

        ]);

        session()->flash('add_comment');

        return redirect('/recruitment');}

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
        $citys=citys::all();
        $agents=agents::select('*')->where('id',$id)->first();
        return view('recruitment.recruitmentcont',compact('companys','agents','nationalities','careers','citys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        recruitmentContract::create([
            'companys_name' => $request->companys_name,
            'id_num' => $request->id_num,
            'agent_id' => $request->agent_id,
            'agents_name' => $request->agents_name,
            'agent_phone1' => $request->agent_phone1,
            'musaned_cont' => $request->musaned_cont,
            'musaned_tawthiq' => $request->musaned_tawthiq,
            'emp_typ2' => $request->emp_typ2,
            'Age' => $request->Age,
            'religion' => $request->religion,
            'emp_exp' => $request->emp_exp,
            'another_exp' => $request->another_exp,
            'nash' => $request->nash,
            'WORK' => $request->WORK,
            'work_emp' => $request->work_emp,
            'sadad_typ' => $request->sadad_typ,
            'hasVisa' => $request->hasVisa,
            'visa_number' => $request->visa_number,
            'hijri_visa' => $request->hijri_visa,
            'date_visa' => $request->date_visa,
            'visa_pay' => $request->visa_pay,
            'destination' => $request->destination,
            'salary' => $request->salary,
            'istgdam_cost' => $request->istgdam_cost,
            'wakell_cost' => $request->wakell_cost,
            'cost_vat' => $request->cost_vat,
            'total_value' => $request->total_value,
            'man_dis' => $request->man_dis,
            'DiscountOfficeCosts' => $request->DiscountOfficeCosts,
            'sadad' => $request->sadad,
            'rest' => $request->rest,
            'cont_date' => Carbon::now(),
            'Status' => 'عقد جديد',

            'Created_by' => (Auth::user()->name),

        ]);
//اضافة سند القبض لعقد التوسط
        if($request->sadad>0){


            $contract_id = recruitmentContract::latest()->first()->id;
            $name_agent=$request->agents_name;
            $total=$request->sadad;
            $typ=$request->sadad_typ;
            $comment_bonds='عقد توسط رقم'.' '.$contract_id.' '.'عن العميل'.' '.$name_agent.' '.'باجمالي مبلغ'.' '.$total.' '.'طريقة السداد'.' '.$typ;
            $bonds = new Bonds();
            $bonds->bonds_type = 'سند قبض عقد';
            $bonds->bonds_type_id = 1;

            $bonds->catch_type = $request->sadad_typ;
            $bonds->bonds_vat = $request->sadad_vat;
            $bonds->bonds_cost = $request->sadad_co;
            $bonds->bonds_total = $request->sadad;


            $bonds->bonds_vat_ar = $request->sadad_vat_ar;
            $bonds->bonds_cost_ar = $request->sadad_co_ar;
            $bonds->bonds_total_ar = $request->sadad_ar;



            $bonds->comment = $comment_bonds;
            $bonds->contract_id_rec  = $contract_id;
            $bonds->contract_typ = 'توسط';
            $bonds->Created_by = Auth::user()->name;

            $bonds->save();
        }
// تعديل مبلغ الخزنة لوارد عقد التوسط
        if ($request->sadad_typ=='نقدآ')
        {
            //تعديل مبلغ الخزنة

            $treasure1 = user_treasure::where('user_id',Auth::user()->id)->latest('created_at')->first();
            $last_treasure=$treasure1->treasure;

            $sadad_to_treasure=$request->sadad;
            $new_treasure=$last_treasure+$sadad_to_treasure;
            $comment2= ' وارد نقدي عن عقد التوسط رقم '.$contract_id.'باجمالي مبلغ'.$sadad_to_treasure;

            $treasure = new user_treasure();
            $treasure->treasure = $new_treasure;
            $treasure->last_treasure = $last_treasure;
            $treasure->comment = $comment2;
            $treasure->amount = $sadad_to_treasure;

            $treasure->contract_id = $contract_id;
            $treasure->typ =11;
            $treasure->user_id =Auth::user()->id;
            $treasure->save();

        }


        session()->flash('add_contract');

        return redirect('/recruitment');
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
    public function recruitment_detils($id)
    {

    $recruitment= recruitmentContract::select('*')->where('id',$id)->first();

        $comment= recruitment_comment::select('*')->where('contract_id',$id)->get();
        $bonds= Bonds::select('*')->where('contract_id_rec',$id)->get();

        return view('recruitment.recruitment_detils',compact('recruitment','comment','bonds'));
    }

}
