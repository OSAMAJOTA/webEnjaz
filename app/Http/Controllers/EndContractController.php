<?php

namespace App\Http\Controllers;

use App\contract;
use App\contract_history;
use App\end_contract;
use App\maid_movmoent;
use App\maidHistory;
use App\maids;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EndContractController extends Controller
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
        $end_contract = contract::where('id',$request->id)->first();
        $agent_sadad=$end_contract->sadad;

        $cost=$request->cost;
            $countss=$request->countss;

        $late_days=$request->late_days;
       if($late_days>1){
           $late_cost=ceil($late_days*150);
           $day_cost= 150;

       }else{
           $late_cost=0;
           $day_cost=0;
       }




        $remin=$request->remaining_days;

        $work_days=$countss-$remin;
        if($work_days==1){
         $day_cost=250;
            $retur_cost=$agent_sadad-($day_cost*$work_days);
        }
        if($work_days==2 || $work_days==3 || $work_days==4 ||$work_days==5 ||$work_days==6 || $work_days==7){
            $day_cost=250;
            $retur_cost=$agent_sadad-($day_cost*$work_days);
        }
        if($work_days>7){
            $day_cost=250;
            $retur_cost=$agent_sadad-($day_cost*$work_days);
        }



        $end_contract->update([
            'status' => 'منتهي',
            'end_contract_date' => $request->end_contract_date2,
            'end_comment' => $request->end_comment,
            'end_reson' => $request->end_reson,
            'late_days' => $request->late_days,
            'remaining_days' => $request->remaining_days,
            'late_cost' => $late_cost,
            'day_cost' => $day_cost,
            'return_cost' => $retur_cost,

            'end_by' => Auth::user()->name,


        ]);
        // اضافة تحديثات العقد
        $contract_history = new contract_history();
        $contract_history->update_reson ='تم   انهاء عقد التشغيل';
        $contract_history->contract_id = $request->id;
        $contract_history->Created_by = Auth::user()->name;

        $contract_history->save();




        //تحديث العاملة القديمة في العقد
        $maid_movmoent = maid_movmoent::where('contract_id',$request->id);
        $maid_movmoent->update([
            'status' => 'غير نشط',
            'end_reson' => $request->end_reson,
            'end_date' => Carbon::now(),


        ]);
        //      استرجاع العاملة للايواء
        $End_connect_maids = maids::where('id',$request->maid_id);
        $End_connect_maids->update([

            'connected' => 0,
            'connected_con_id' => '',

        ]);
        // //        انهاء خدمة العاملة الاولي في تفاصيل العاملة
        $history_end_maid = maidHistory::where('maid_id',$request->maid_id)->where('contract_id',$request->id);
        $history_end_maid->update([

            'maid_rate' => $request->maid_rate,
            'end_date' =>Carbon::now(),

        ]);



       session()->flash('end_contract');

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\end_contract  $end_contract
     * @return \Illuminate\Http\Response
     */
    public function show(end_contract $end_contract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\end_contract  $end_contract
     * @return \Illuminate\Http\Response
     */
    public function edit(end_contract $end_contract)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\end_contract  $end_contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, end_contract $end_contract)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\end_contract  $end_contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(end_contract $end_contract)
    {
        //
    }
}
