<?php

namespace App\Http\Controllers;

use App\agents;
use App\careers;
use App\citys;
use App\companys;
use App\contract;
use App\nationalities;
use App\recruitmentContract;
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
        $recruitment_count=contract::all();

        $contract_count2=$recruitment_count->count();
        return view('recruitment.recruitment',compact('recruitment','contract_count2'));
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
echo "هنا سيتم عرض تفاصيل العقد ";
    }

}
