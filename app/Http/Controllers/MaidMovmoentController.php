<?php

namespace App\Http\Controllers;

use App\contract;
use App\maid_movmoent;
use App\maids;
use App\maidHistory;
use App\sections;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MaidMovmoentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $mytime =Carbon::now();

   if($request->emp_new_id==$request->maids_id){
       session()->flash('delete', 'لا يمكن تبديل العاملة في نفس العقد');
       return redirect('/rent');
   }else{


       maid_movmoent::create([
           'maid_name' => $request->emp_name,// اسم العاملة الجديدة
           'maid_id' => $request->emp_new_id,// رقم العاملة الجديدة
           'contract_id' => $request->id,//رقم العقد
           'status' => 'نشط',
           'comment' => $request->comment,
           'Created_by' => (Auth::user()->name),

       ]);
       //  اضافة هستوري العاملة الجديدة
       $get_contracts = DB::table("contracts")->where("id", $request->id)->first();
       $contract_type=$get_contracts->typ;
       $agents_name=$get_contracts->agents_name;
       $agents_id=$get_contracts->agent_id;
       $Duration=$get_contracts->Duration;
       maidHistory::create([
           'contract_type' =>$contract_type,//
           'contract_id' => $request->id,//
           'maid_id' => $request->emp_new_id,
           'agents_id' => $agents_id,
           'agents_name' => $agents_name,
           'Duration' => $Duration,
           'str_date' => Carbon::now(),
           'Created_by' => (Auth::user()->name),

       ]);
       //تحديث العاملة القديمة في العقد
       $maid_movmoent = maid_movmoent::where('contract_id',$request->id)->where('maid_id',$request->maids_id);
       $maid_movmoent->update([
           'status' => 'غير نشط',
           'end_reson' => $request->end_reson,
           'end_date' => Carbon::now(),

       ]);
// تغيير بيانات العاملة الجديدة في العقد
       $maid_in_cont = contract::where('id',$request->id);
       $maid_in_cont->update([
           'maids_id' => $request->emp_new_id,
           'emp_num' => $request->emp_num,
           'emp_name' => $request->emp_name,

       ]);

       //      استرجاع العاملة للايواء
       $connect_maids = maids::where('id',$request->maids_id);
       $connect_maids->update([

           'connected' => 0,
           'connected_con_id' => '',

       ]);
       // //        اخراج العاملة الجديدة من الايواء
       $connect_maid = maids::where('id',$request->emp_new_id);
       $connect_maid->update([

           'connected' => 1,
           'connected_con_id' =>$request->id,

       ]);

       // //        انهاء خدمة العاملة الاولي في تفاصيل العاملة
       $history_end_maid = maidHistory::where('maid_id',$request->maids_id);
       $history_end_maid->update([


           'end_date' =>Carbon::now(),

       ]);


       session()->flash('change_emp');
       return redirect('/rent');
   }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\maid_movmoent  $maid_movmoent
     * @return \Illuminate\Http\Response
     */
    public function show(maid_movmoent $maid_movmoent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\maid_movmoent  $maid_movmoent
     * @return \Illuminate\Http\Response
     */
    public function edit(maid_movmoent $maid_movmoent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\maid_movmoent  $maid_movmoent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, maid_movmoent $maid_movmoent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\maid_movmoent  $maid_movmoent
     * @return \Illuminate\Http\Response
     */
    public function destroy(maid_movmoent $maid_movmoent)
    {
        //
    }
}
