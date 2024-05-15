<?php

namespace App\Http\Controllers;

use App\Bonds;
use App\contract;
use App\contract_comment;
use App\contract_history;
use App\contractAttachments;
use App\maid_movmoent;
use App\man_discount;
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
    public function edit(contract $contract)
    {
        //
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
        //
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


    return view('rent.rent',compact('contract','contract_count2'));
}
//الاسم عربي اسم العميل

elseif ($request->cont_num=='' &&$request->agent_name&&$request->cont_status==''&&$request->agent_phone==''&&$request->agent_email==''&&$request->agent_id==''&&$request->create_date==''&&$request->nash==''&&$request->work==''&&$request->create_by==''&&$request->end_after==''&&$request->typ==''&&$request->end_typ==''&&$request->mony_status==''&&$request->maid_status==''&&$request->end_date==''){
    $contract=contract::select('*')->where('agents_name', 'like', '%' .$request->agent_name. '%')->orderBy('id', 'desc')->paginate(7);
    $contract_count=contract::select('*')->where('agents_name', 'like', '%' .$request->agent_name. '%')->get();
    $contract_count2=$contract_count->count();


    return view('rent.rent',compact('contract','contract_count2'));
}
//حالة العقد
elseif ($request->cont_num=='' &&$request->agent_name==''&&$request->cont_status&&$request->agent_phone==''&&$request->agent_email==''&&$request->agent_id==''&&$request->create_date==''&&$request->nash==''&&$request->work==''&&$request->create_by==''&&$request->end_after==''&&$request->typ==''&&$request->end_typ==''&&$request->mony_status==''&&$request->maid_status==''&&$request->end_date==''){
    echo "//حالة العقد";
}
//جوال العميل
elseif ($request->cont_num=='' &&$request->agent_name==''&&$request->cont_status==''&&$request->agent_phone&&$request->agent_email==''&&$request->agent_id==''&&$request->create_date==''&&$request->nash==''&&$request->work==''&&$request->create_by==''&&$request->end_after==''&&$request->typ==''&&$request->end_typ==''&&$request->mony_status==''&&$request->maid_status==''&&$request->end_date==''){

    $contract=contract::select('*')->where('agent_phone1',$request->agent_phone)->orderBy('id', 'desc')->paginate(7);

    $contract_count=contract::select('*')->where('agent_phone1',$request->agent_phone)->get();
    $contract_count2=$contract_count->count();
    return view('rent.rent',compact('contract','contract_count2'));
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
    return view('rent.rent',compact('contract','contract_count2'));
}
//تاريخ الانشاء
elseif ($request->cont_num=='' &&$request->agent_name==''&&$request->cont_status==''&&$request->agent_phone==''&&$request->agent_email==''&&$request->agent_id==''&&$request->create_date&&$request->nash==''&&$request->work==''&&$request->create_by==''&&$request->end_after==''&&$request->typ==''&&$request->end_typ==''&&$request->mony_status==''&&$request->maid_status==''&&$request->end_date==''){
    $contract=contract::select('*')->where('start_date',$request->create_date)->orderBy('id', 'desc')->paginate(7);

    $contract_count=contract::select('*')->where('start_date',$request->create_date)->get();
    $contract_count2=$contract_count->count();
    return view('rent.rent',compact('contract','contract_count2'));
}
//الجنسية
elseif ($request->cont_num=='' &&$request->agent_name==''&&$request->cont_status==''&&$request->agent_phone==''&&$request->agent_email==''&&$request->agent_id==''&&$request->create_date==''&&$request->nash&&$request->work==''&&$request->create_by==''&&$request->end_after==''&&$request->typ==''&&$request->end_typ==''&&$request->mony_status==''&&$request->maid_status==''&&$request->end_date==''){
    echo "//الجنسية";
}
//الوظيفة
elseif ($request->cont_num=='' &&$request->agent_name==''&&$request->cont_status==''&&$request->agent_phone==''&&$request->agent_email==''&&$request->agent_id==''&&$request->create_date==''&&$request->nash==''&&$request->work&&$request->create_by==''&&$request->end_after==''&&$request->typ==''&&$request->end_typ==''&&$request->mony_status==''&&$request->maid_status==''&&$request->end_date==''){
    echo "//الوظيفة";
}
//تم الانشاء بواسطة
elseif ($request->cont_num=='' &&$request->agent_name==''&&$request->cont_status==''&&$request->agent_phone==''&&$request->agent_email==''&&$request->agent_id==''&&$request->create_date==''&&$request->nash==''&&$request->work==''&&$request->create_by&&$request->end_after==''&&$request->typ==''&&$request->end_typ==''&&$request->mony_status==''&&$request->maid_status==''&&$request->end_date==''){
    echo "//تم الانشاء بواسطة";
}
//ينتهي بعد
elseif ($request->cont_num=='' &&$request->agent_name==''&&$request->cont_status==''&&$request->agent_phone==''&&$request->agent_email==''&&$request->agent_id==''&&$request->create_date==''&&$request->nash==''&&$request->work==''&&$request->create_by==''&&$request->end_after&&$request->typ==''&&$request->end_typ==''&&$request->mony_status==''&&$request->maid_status==''&&$request->end_date==''){
    echo "//ينتهي بعد";
}
//النوع
elseif ($request->cont_num=='' &&$request->agent_name==''&&$request->cont_status==''&&$request->agent_phone==''&&$request->agent_email==''&&$request->agent_id==''&&$request->create_date==''&&$request->nash==''&&$request->work==''&&$request->create_by==''&&$request->end_after==''&&$request->typ&&$request->end_typ==''&&$request->mony_status==''&&$request->maid_status==''&&$request->end_date==''){
    echo "//النوع";
}
//تاريخ نهاية العقد
elseif ($request->cont_num=='' &&$request->agent_name==''&&$request->cont_status==''&&$request->agent_phone==''&&$request->agent_email==''&&$request->agent_id==''&&$request->create_date==''&&$request->nash==''&&$request->work==''&&$request->create_by==''&&$request->end_after==''&&$request->typ==''&&$request->end_typ&&$request->mony_status==''&&$request->maid_status==''&&$request->end_date==''){
    echo "تاريخ نهاية العقد";
}
//الحالة المالية
elseif ($request->cont_num=='' &&$request->agent_name==''&&$request->cont_status==''&&$request->agent_phone==''&&$request->agent_email==''&&$request->agent_id==''&&$request->create_date==''&&$request->nash==''&&$request->work==''&&$request->create_by==''&&$request->end_after==''&&$request->typ==''&&$request->end_typ==''&&$request->mony_status&&$request->maid_status==''&&$request->end_date==''){
    echo "الحالة المالية";
}
//حالة اختيار العاملة
elseif ($request->cont_num=='' &&$request->agent_name==''&&$request->cont_status==''&&$request->agent_phone==''&&$request->agent_email==''&&$request->agent_id==''&&$request->create_date==''&&$request->nash==''&&$request->work==''&&$request->create_by==''&&$request->end_after==''&&$request->typ==''&&$request->end_typ==''&&$request->mony_status==''&&$request->maid_status&&$request->end_date==''){
    echo "حالة اختيار العامل";
}
// تاريخ نهاية العقد
elseif ($request->cont_num=='' &&$request->agent_name==''&&$request->cont_status==''&&$request->agent_phone==''&&$request->agent_email==''&&$request->agent_id==''&&$request->create_date==''&&$request->nash==''&&$request->work==''&&$request->create_by==''&&$request->end_after==''&&$request->typ==''&&$request->end_typ==''&&$request->mony_status==''&&$request->maid_status==''&&$request->end_date){
    echo "تاريخ نهاية العقد";
}


    }

}
