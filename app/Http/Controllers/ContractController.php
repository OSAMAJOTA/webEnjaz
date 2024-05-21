<?php

namespace App\Http\Controllers;

use App\agents;
use App\Bonds;
use App\careers;
use App\companys;
use App\contract;
use App\contract_comment;
use App\contract_history;
use App\contractAttachments;
use App\Durations;
use App\employees;
use App\maid_movmoent;
use App\maids;
use App\man_discount;
use App\nationalities;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Psy\CodeCleaner\ReturnTypePass;

class ContractController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(contract $contract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companys=companys::all();
        $maids=maids::all();
        $Durations=Durations::all();
        $nationalities=nationalities::all();
        $careers=careers::select('*')->where('show','=',1)->get();
        $contract=contract::select('*')->where('id',$id)->first();


      return view('rent.rentUpdate',compact('Durations','nationalities','careers','maids','companys','contract'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contract $contract)
    {
        $contract = contract::find($request->cont_id);

        $contract->update([
            'typ' => $request->typ,
            'nash' => $request->nash,
            'Duration' => $request->Duration,
            'start_date' => $request->start_date,
            'sadad_typ' => $request->sadad_typ,
            'WORK' => $request->WORK,
            'end_date' => $request->end_date,
            'emp_salary' => $request->emp_salary,
            'tamin' => $request->tamin,
            'vat_cost' => $request->vat_cost,
            'cost' => $request->cost,
            'countss' => $request->countss,
            'man_discount' => $request->man_discount,
            'tot' => $request->tot,

        ]);
        $cont_id=$request->cont_id;

        session()->flash('edit','تم تعديل العقد بنجاج');
        return redirect('/rentupdate/'.$cont_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(contract $contract)
    {
        //
    }

    public function getoffer($id)
    {
        $products = DB::table("offers")->where("nash", $id)->where("active",'مفعل')->pluck("Duration", "id");
        return json_encode($products);
    }
    public function getdataoffer($id)
    {
        $products = DB::table("offers")->where("Duration", $id)->where("active",'مفعل')->first();

        return json_encode($products);
    }

    public function contract_detils($id)
    {
        $man_discount=man_discount::where('contract_id', $id)->get();
        $history=contract_history::where('contract_id', $id)->get();
        $comment=contract_comment::where('contract_id', $id)->get();
        $bonds=Bonds::where('contract_id', $id)->get();
        $contract = contract::where('id', $id)->first();
        $maid_movment=maid_movmoent::where('contract_id', $id)->get();

        $attachments = contractAttachments::where('contract_id', $id)->get();
       return view('rent.detils',compact('contract','attachments','comment','maid_movment','history','man_discount','bonds'));
    }



    public function get_file($contract_num,$file_name)

    {
        $contents= Storage::disk('contract_uploads')->getDriver()->getAdapter()->applyPathPrefix($contract_num.'/'.$file_name);
        return response()->download( $contents);
    }

    public function open_file($contract_num, $file_name)

    {
        $files = Storage::disk('contract_uploads')->getDriver()->getAdapter()->applyPathPrefix($contract_num . '/' . $file_name);
        return response()->file($files);
    }

    public function serach_rent(request $request )

    {
        //رقم العقد
if($request->cont_num &&$request->agent_name==''&&$request->cont_status==''&&$request->agent_phone==''&&$request->agent_email==''&&$request->agent_id==''&&$request->create_date==''&&$request->nash==''&&$request->work==''&&$request->create_by==''&&$request->end_after==''&&$request->typ==''&&$request->end_typ==''&&$request->mony_status==''&&$request->maid_status==''&&$request->end_date==''){
    $contract=contract::select('*')->where('id',$request->cont_num)->orderBy('id', 'desc')->paginate(7);
    $contract_count=contract::select('*')->where('id',$request->cont_num)->get();
    $contract_count2=$contract_count->count();

    $nationalities=nationalities::all();
    $careers=careers::select('*')->where('show','=',1)->get();
    $employees=employees::all();

    return view('rent.rent',compact('contract','contract_count2','nationalities','careers','employees'));
}
//الاسم عربي اسم العميل

elseif ($request->cont_num=='' &&$request->agent_name&&$request->cont_status==''&&$request->agent_phone==''&&$request->agent_email==''&&$request->agent_id==''&&$request->create_date==''&&$request->nash==''&&$request->work==''&&$request->create_by==''&&$request->end_after==''&&$request->typ==''&&$request->end_typ==''&&$request->mony_status==''&&$request->maid_status==''&&$request->end_date==''){
    $contract=contract::select('*')->where('agents_name', 'like', '%' .$request->agent_name. '%')->orderBy('id', 'desc')->paginate(7);
    $contract_count=contract::select('*')->where('agents_name', 'like', '%' .$request->agent_name. '%')->get();
    $contract_count2=$contract_count->count();


    $nationalities=nationalities::all();
    $careers=careers::select('*')->where('show','=',1)->get();
    $employees=employees::all();

    return view('rent.rent',compact('contract','contract_count2','nationalities','careers','employees'));
}
//حالة العقد
elseif ($request->cont_num=='' &&$request->agent_name==''&&$request->cont_status&&$request->agent_phone==''&&$request->agent_email==''&&$request->agent_id==''&&$request->create_date==''&&$request->nash==''&&$request->work==''&&$request->create_by==''&&$request->end_after==''&&$request->typ==''&&$request->end_typ==''&&$request->mony_status==''&&$request->maid_status==''&&$request->end_date==''){
    $contract=contract::select('*')->where('status',$request->cont_status)->orderBy('id', 'desc')->paginate(7);

    $contract_count=contract::select('*')->where('status',$request->cont_status)->get();
    $contract_count2=$contract_count->count();
    $nationalities=nationalities::all();
    $careers=careers::select('*')->where('show','=',1)->get();
    $employees=employees::all();

    return view('rent.rent',compact('contract','contract_count2','nationalities','careers','employees'));
}
//جوال العميل
elseif ($request->cont_num=='' &&$request->agent_name==''&&$request->cont_status==''&&$request->agent_phone&&$request->agent_email==''&&$request->agent_id==''&&$request->create_date==''&&$request->nash==''&&$request->work==''&&$request->create_by==''&&$request->end_after==''&&$request->typ==''&&$request->end_typ==''&&$request->mony_status==''&&$request->maid_status==''&&$request->end_date==''){

    $contract=contract::select('*')->where('agent_phone1',$request->agent_phone)->orderBy('id', 'desc')->paginate(7);

    $contract_count=contract::select('*')->where('agent_phone1',$request->agent_phone)->get();
    $contract_count2=$contract_count->count();
    $nationalities=nationalities::all();
    $careers=careers::select('*')->where('show','=',1)->get();
    $employees=employees::all();

    return view('rent.rent',compact('contract','contract_count2','nationalities','careers','employees'));
}
//البريد الالكتروني
elseif ($request->cont_num=='' &&$request->agent_name==''&&$request->cont_status==''&&$request->agent_phone==''&&$request->agent_email&&$request->agent_id==''&&$request->create_date==''&&$request->nash==''&&$request->work==''&&$request->create_by==''&&$request->end_after==''&&$request->typ==''&&$request->end_typ==''&&$request->mony_status==''&&$request->maid_status==''&&$request->end_date==''){
    echo "//البريد الالكتروني";
}
//رقم الهوية
elseif ($request->cont_num=='' &&$request->agent_name==''&&$request->cont_status==''&&$request->agent_phone==''&&$request->agent_email==''&&$request->agent_id&&$request->create_date==''&&$request->nash==''&&$request->work==''&&$request->create_by==''&&$request->end_after==''&&$request->typ==''&&$request->end_typ==''&&$request->mony_status==''&&$request->maid_status==''&&$request->end_date==''){
    $contract=contract::select('*')->where('id_num',$request->agent_id)->orderBy('id', 'desc')->paginate(7);

    $contract_count=contract::select('*')->where('id_num',$request->agent_id)->get();
    $contract_count2=$contract_count->count();
    $nationalities=nationalities::all();
    $careers=careers::select('*')->where('show','=',1)->get();
    $employees=employees::all();

    return view('rent.rent',compact('contract','contract_count2','nationalities','careers','employees'));
}
//تاريخ الانشاء
elseif ($request->cont_num=='' &&$request->agent_name==''&&$request->cont_status==''&&$request->agent_phone==''&&$request->agent_email==''&&$request->agent_id==''&&$request->create_date&&$request->nash==''&&$request->work==''&&$request->create_by==''&&$request->end_after==''&&$request->typ==''&&$request->end_typ==''&&$request->mony_status==''&&$request->maid_status==''&&$request->end_date==''){
    $contract=contract::select('*')->where('start_date',$request->create_date)->orderBy('id', 'desc')->paginate(7);

    $contract_count=contract::select('*')->where('start_date',$request->create_date)->get();
    $contract_count2=$contract_count->count();
    $nationalities=nationalities::all();
    $careers=careers::select('*')->where('show','=',1)->get();
    $employees=employees::all();

    return view('rent.rent',compact('contract','contract_count2','nationalities','careers','employees'));
}
//الجنسية
elseif ($request->cont_num=='' &&$request->agent_name==''&&$request->cont_status==''&&$request->agent_phone==''&&$request->agent_email==''&&$request->agent_id==''&&$request->create_date==''&&$request->nash&&$request->work==''&&$request->create_by==''&&$request->end_after==''&&$request->typ==''&&$request->end_typ==''&&$request->mony_status==''&&$request->maid_status==''&&$request->end_date==''){
    $contract=contract::select('*')->where('nash',$request->nash)->orderBy('id', 'desc')->paginate(7);

    $contract_count=contract::select('*')->where('nash',$request->nash)->get();
    $contract_count2=$contract_count->count();
    $nationalities=nationalities::all();
    $careers=careers::select('*')->where('show','=',1)->get();
    $employees=employees::all();

    return view('rent.rent',compact('contract','contract_count2','nationalities','careers','employees'));
}
//الوظيفة
elseif ($request->cont_num=='' &&$request->agent_name==''&&$request->cont_status==''&&$request->agent_phone==''&&$request->agent_email==''&&$request->agent_id==''&&$request->create_date==''&&$request->nash==''&&$request->work&&$request->create_by==''&&$request->end_after==''&&$request->typ==''&&$request->end_typ==''&&$request->mony_status==''&&$request->maid_status==''&&$request->end_date==''){
    $contract=contract::select('*')->where('WORK',$request->work)->orderBy('id', 'desc')->paginate(7);

    $contract_count=contract::select('*')->where('WORK',$request->work)->get();
    $contract_count2=$contract_count->count();
    $nationalities=nationalities::all();
    $careers=careers::select('*')->where('show','=',1)->get();
    $employees=employees::all();

    return view('rent.rent',compact('contract','contract_count2','nationalities','careers','employees'));
}
//تم الانشاء بواسطة
elseif ($request->cont_num=='' &&$request->agent_name==''&&$request->cont_status==''&&$request->agent_phone==''&&$request->agent_email==''&&$request->agent_id==''&&$request->create_date==''&&$request->nash==''&&$request->work==''&&$request->create_by&&$request->end_after==''&&$request->typ==''&&$request->end_typ==''&&$request->mony_status==''&&$request->maid_status==''&&$request->end_date==''){
    $contract=contract::select('*')->where('Created_by',$request->create_by)->orderBy('id', 'desc')->paginate(7);

    $contract_count=contract::select('*')->where('Created_by',$request->create_by)->get();
    $contract_count2=$contract_count->count();
    $nationalities=nationalities::all();
    $careers=careers::select('*')->where('show','=',1)->get();
    $employees=employees::all();

    return view('rent.rent',compact('contract','contract_count2','nationalities','careers','employees'));
}
//ينتهي بعد
elseif ($request->cont_num=='' &&$request->agent_name==''&&$request->cont_status==''&&$request->agent_phone==''&&$request->agent_email==''&&$request->agent_id==''&&$request->create_date==''&&$request->nash==''&&$request->work==''&&$request->create_by==''&&$request->end_after&&$request->typ==''&&$request->end_typ==''&&$request->mony_status==''&&$request->maid_status==''&&$request->end_date==''){

    $Addday=$request->end_after;
    $currentDateTime = Carbon::now()->format('Y-m-d');
    $newDateTime = Carbon::now()->addDay($Addday)->format('Y-m-d');

    $contract=contract::select('*')->where('end_date',$newDateTime)->orderBy('id', 'desc')->paginate(7);

    $contract_count=contract::select('*')->where('end_date',$newDateTime)->get();
    $contract_count2=$contract_count->count();
    $nationalities=nationalities::all();
    $careers=careers::select('*')->where('show','=',1)->get();
    $employees=employees::all();

    return view('rent.rent',compact('contract','contract_count2','nationalities','careers','employees'));

}
//النوع
elseif ($request->cont_num=='' &&$request->agent_name==''&&$request->cont_status==''&&$request->agent_phone==''&&$request->agent_email==''&&$request->agent_id==''&&$request->create_date==''&&$request->nash==''&&$request->work==''&&$request->create_by==''&&$request->end_after==''&&$request->typ&&$request->end_typ==''&&$request->mony_status==''&&$request->maid_status==''&&$request->end_date==''){
    $contract=contract::select('*')->orderBy('id', 'desc')->paginate(7);

    $contract_count=contract::select('*')->get();
    $contract_count2=$contract_count->count();
    $nationalities=nationalities::all();
    $careers=careers::select('*')->where('show','=',1)->get();
    $employees=employees::all();

    return view('rent.rent',compact('contract','contract_count2','nationalities','careers','employees'));
}
//تاريخ نهاية العقد
elseif ($request->cont_num=='' &&$request->agent_name==''&&$request->cont_status==''&&$request->agent_phone==''&&$request->agent_email==''&&$request->agent_id==''&&$request->create_date==''&&$request->nash==''&&$request->work==''&&$request->create_by==''&&$request->end_after==''&&$request->typ==''&&$request->end_typ&&$request->mony_status==''&&$request->maid_status==''&&$request->end_date==''){
    $contract=contract::select('*')->where('end_date',$request->end_typ)->orderBy('id', 'desc')->paginate(7);

    $contract_count=contract::select('*')->where('end_date',$request->end_typ)->get();
    $contract_count2=$contract_count->count();
    $nationalities=nationalities::all();
    $careers=careers::select('*')->where('show','=',1)->get();
    $employees=employees::all();

    return view('rent.rent',compact('contract','contract_count2','nationalities','careers','employees'));
}
//الحالة المالية
elseif ($request->cont_num=='' &&$request->agent_name==''&&$request->cont_status==''&&$request->agent_phone==''&&$request->agent_email==''&&$request->agent_id==''&&$request->create_date==''&&$request->nash==''&&$request->work==''&&$request->create_by==''&&$request->end_after==''&&$request->typ==''&&$request->end_typ==''&&$request->mony_status&&$request->maid_status==''&&$request->end_date==''){
//متبقي علي العقد مبلغ
    if($request->mony_status==1){
        $contract=contract::select('*')->where('rest','>',0)->orderBy('id', 'desc')->paginate(7);

        $contract_count=contract::select('*')->where('rest','>',0)->get();
        $contract_count2=$contract_count->count();
        $nationalities=nationalities::all();
        $careers=careers::select('*')->where('show','=',1)->get();
        $employees=employees::all();

        return view('rent.rent',compact('contract','contract_count2','nationalities','careers','employees'));
    }else{
        //استرداد مبلغ للعميل
        $contract=contract::select('*')->where('return_cost','>',0)->orderBy('id', 'desc')->paginate(7);

        $contract_count=contract::select('*')->where('return_cost','>',0)->get();
        $contract_count2=$contract_count->count();
        $nationalities=nationalities::all();
        $careers=careers::select('*')->where('show','=',1)->get();
        $employees=employees::all();

        return view('rent.rent',compact('contract','contract_count2','nationalities','careers','employees'));
    }
}
//حالة اختيار العاملة
elseif ($request->cont_num=='' &&$request->agent_name==''&&$request->cont_status==''&&$request->agent_phone==''&&$request->agent_email==''&&$request->agent_id==''&&$request->create_date==''&&$request->nash==''&&$request->work==''&&$request->create_by==''&&$request->end_after==''&&$request->typ==''&&$request->end_typ==''&&$request->mony_status==''&&$request->maid_status&&$request->end_date==''){

    $stutas=$request->maid_status;
    if($stutas==1){
        $contract=contract::select('*')->where('emp_num','=',null)->orderBy('id', 'desc')->paginate(7);

        $contract_count=contract::select('*')->where('emp_num','=',null)->get();
        $contract_count2=$contract_count->count();
        $nationalities=nationalities::all();
        $careers=careers::select('*')->where('show','=',1)->get();
        $employees=employees::all();

        return view('rent.rent',compact('contract','contract_count2','nationalities','careers','employees'));
    }else{
        $contract=contract::select('*')->where('emp_num','<>','')->orderBy('id', 'desc')->paginate(7);

        $contract_count=contract::select('*')->where('emp_num','<>','')->get();
        $contract_count2=$contract_count->count();
        $nationalities=nationalities::all();
        $careers=careers::select('*')->where('show','=',1)->get();
        $employees=employees::all();

        return view('rent.rent',compact('contract','contract_count2','nationalities','careers','employees'));

    }
}
// تاريخ نهاية العقد
elseif ($request->cont_num=='' &&$request->agent_name==''&&$request->cont_status==''&&$request->agent_phone==''&&$request->agent_email==''&&$request->agent_id==''&&$request->create_date==''&&$request->nash==''&&$request->work==''&&$request->create_by==''&&$request->end_after==''&&$request->typ==''&&$request->end_typ==''&&$request->mony_status==''&&$request->maid_status==''&&$request->end_date){
    echo "تاريخ نهاية العقد";
}


    }

}
