<?php

namespace App\Http\Controllers;

use App\agents;
use App\Bonds;
use App\careers;
use App\companys;
use App\contract;
use App\contract_history;
use App\Durations;
use App\employees;
use App\Exports\rentExport;
use App\Notifications\mail_contract;
use App\User;
use App\maidHistory;
use Illuminate\Support\Facades\Notification;
use App\maids;
use App\contract_comment;
use App\maid_movmoent;
use App\man_discount;
use App\nationalities;
use App\RentController;
use App\contractAttachments;
use App\user_treasure;
use Carbon\Carbon;
use Dompdf\Dompdf;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Facades\Excel;

class RentControllerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contract=contract::select('*')->orderBy('id', 'desc')->paginate(7);
        $contract_count=contract::all();

        $contract_count2=$contract_count->count();
        $nationalities=nationalities::all();
        $careers=careers::select('*')->where('show','=',1)->get();
        $employees=employees::all();

       return view('rent.rent',compact('contract','contract_count2','nationalities','careers','employees','contract_count'));
    }
    public function export_contract(Request $request)
    {
        $contract = json_decode($request->contract);
        $contract = collect($contract);

     return Excel::download(new rentExport($contract), 'عقود التشغيل.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $companys=companys::all();
        $maids=maids::all();
$Durations=Durations::all();
$nationalities=nationalities::all();
$careers=careers::select('*')->where('show','=',1)->get();
        $agents=agents::select('*')->where('id','=',$id)->first();

    return view('rent.rentcont',compact('agents','Durations','nationalities','careers','maids','companys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
if($request->emp_num==''){

    contract::create([
        'companys_name' => $request->companys_name,   //اسم الفرع
        'id_num' => $request->id_num,   // رقم هوية العميل
        'agent_id' => $request->agent_id,   // رقم العميل في قاعدة البيانات
        'agents_name' => $request->agents_name,  // اسم العميل
        'agent_phone1' => $request->agent_phone1,  // رقم جوال العميل
        'typ' => $request->typ,  // نوع العقد تشغيل او
        'nash' => $request->nash,  // جنسية العاملة في العقد
        'Duration' => $request->Duration,  // مدة العقد
        'countss' => $request->countss,  // عدد الايام بالارقام
        'start_date' => $request->start_date,   // تاريخ بداية العقد
        'end_date' => $request->end_date,  // تاريخ نهاية العقد
        'sadad_typ' => $request->sadad_typ,  // نوع السداد
        'WORK' => $request->WORK,  // وظيفة العاملة


        'status' => 'ساري',   // حالة العقد
        'sadad' => $request->sadad,    // مبلغ السداد
        'exp_sadad' => $request->exp_sadad,    // تاريخ المتوقع لل السداد

        'emp_salary' => $request->emp_salary,   // راتب العاملة
        'tamin' => $request->tamin,    // التأمين
        'vat_cost' => $request->vat_cost,    // ضريبة التكلفة
        'cost' => $request->cost,    // تكلفة العقد بدون الضريبة
        'man_discount' => $request->man_discount,  // تخفيض المدير
        'rest' => $request->rest,    // المتبقي
        'tot' => $request->tot,//الاجمالي
        'Created_by' => (Auth::user()->name),

    ]);

    //اذا يوجد خصم مدير
    if($request->man_discount>0){
        $contract_id = contract::latest()->first()->id;
        $contract_man_dis = new man_discount();
        $contract_man_dis->man_discount =$request->man_discount;
        $contract_man_dis->contract_id = $contract_id;
        $contract_man_dis->Created_by = Auth::user()->name;

        $contract_man_dis->save();
    }
    // اضافة تحديثات العقد
    $contract_id = contract::latest()->first()->id;
    $contract_history = new contract_history();
    $contract_history->update_reson ='تم اضافة عقد التشغيل';
    $contract_history->contract_id = $contract_id;
    $contract_history->Created_by = Auth::user()->name;

    $contract_history->save();




    if ($request->hasFile('pic')) {


        $contract_id = contract::latest()->first()->id;
        $image = $request->file('pic');
        $file_name = $image->getClientOriginalName();
        $contract_number = contract::latest()->first()->id;

        $attachments = new contractAttachments();
        $attachments->file_name = $file_name;
        $attachments->contract_num = contract::latest()->first()->id;
        $attachments->Created_by = Auth::user()->name;
        $attachments->contract_id = $contract_id;
        $attachments->save();

        // move pic
        $imageName = $request->pic->getClientOriginalName();
        $request->pic->move(public_path('Attachments_contract/' . $contract_number), $imageName);

    }

    if($request->sadad>0){


        $contract_id = contract::latest()->first()->id;
        $name_agent=$request->agents_name;
        $total=$request->sadad;
        $typ=$request->sadad_typ;
        $comment_bonds='عقد تشغيل رقم'.' '.$contract_id.' '.'عن العميل'. ' '.$name_agent.' '.'باجمالي مبلغ'.' '.$total.' '.'طريقة السداد'.' '.$typ;
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


        $bonds->comment  = $comment_bonds;

        $bonds->contract_id  = $contract_id;
        $bonds->Created_by = Auth::user()->name;

        $bonds->save();
    }



    // في حالة كان سند القبض نقدآ



    if ($request->sadad_typ=='نقدآ')
    {
        //تعديل مبلغ الخزنة

        $treasure1 = user_treasure::where('user_id',Auth::user()->id)->latest('created_at')->first();
        $last_treasure=$treasure1->treasure;

        $sadad_to_treasure=$request->sadad;
        $new_treasure=$last_treasure+$sadad_to_treasure;
        $comment2= ' وارد نقدي عن العقد رقم '.$contract_id.'باجمالي مبلغ'.$sadad_to_treasure;

        $treasure = new user_treasure();
        $treasure->treasure = $new_treasure;
        $treasure->last_treasure = $last_treasure;
        $treasure->comment = $comment2;
        $treasure->amount = $sadad_to_treasure;
        $treasure->contract_id = $contract_id;
        $treasure->typ =1;
        $treasure->user_id =Auth::user()->id;
        $treasure->save();

    }

    $contract_id = contract::latest()->first()->id;
    //$user=User::first();
    //Notification::send($user,new mail_contract($contract_id));

    session()->flash('add_contract');

    return redirect('/print_cont/'.$contract_id);


//في حالة يوجد عامل في العقد
}else{


    contract::create([
        'companys_name' => $request->companys_name,   //اسم الفرع
        'id_num' => $request->id_num,   // رقم هوية العميل
        'agent_id' => $request->agent_id,   // رقم العميل في قاعدة البيانات
        'agents_name' => $request->agents_name,  // اسم العميل
        'agent_phone1' => $request->agent_phone1,  // رقم جوال العميل
        'typ' => $request->typ,  // نوع العقد تشغيل او
        'nash' => $request->nash,  // جنسية العاملة في العقد
        'Duration' => $request->Duration,  // مدة العقد
        'countss' => $request->countss,  // عدد الايام بالارقام
        'start_date' => $request->start_date,   // تاريخ بداية العقد
        'end_date' => $request->end_date,  // تاريخ نهاية العقد
        'sadad_typ' => $request->sadad_typ,  // نوع السداد
        'WORK' => $request->WORK,  // وظيفة العاملة
        'emp_num' => $request->emp_num,      // رقم العاملة
        'emp_name' => $request->emp_name,  // اسم العاملة
        'maids_id' => $request->emp_id,  // id العاملة

        'status' => 'ساري',   // حالة العقد
        'sadad' => $request->sadad,    // مبلغ السداد
        'exp_sadad' => $request->exp_sadad,    // تاريخ المتوقع لل السداد

        'emp_salary' => $request->emp_salary,   // راتب العاملة
        'tamin' => $request->tamin,    // التأمين
        'vat_cost' => $request->vat_cost,    // ضريبة التكلفة
        'cost' => $request->cost,    // تكلفة العقد بدون الضريبة
        'man_discount' => $request->man_discount,  // تخفيض المدير
        'rest' => $request->rest,    // المتبقي
        'tot' => $request->tot,//الاجمالي

        'Created_by' => (Auth::user()->name),

    ]);
    if($request->sadad>0){


        $contract_id = contract::latest()->first()->id;
        $name_agent=$request->agents_name;
        $total=$request->sadad;
        $typ=$request->sadad_typ;
        $comment_bonds='عقد تشغيل رقم'.$contract_id.'عن العميل'.$name_agent.'باجمالي مبلغ'.$total.'طريقة السداد'.$typ;
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
        $bonds->contract_id  = $contract_id;
        $bonds->Created_by = Auth::user()->name;

        $bonds->save();
    }


    // في حالة كان سند القبض نقدآ



    if ($request->sadad_typ=='نقدآ')
    {
        //تعديل مبلغ الخزنة

        $treasure1 = user_treasure::where('user_id',Auth::user()->id)->latest('created_at')->first();
        $last_treasure=$treasure1->treasure;

        $sadad_to_treasure=$request->sadad;
        $new_treasure=$last_treasure+$sadad_to_treasure;
        $comment2= ' وارد نقدي عن العقد رقم '.$contract_id.'باجمالي مبلغ'.$sadad_to_treasure;

        $treasure = new user_treasure();
        $treasure->treasure = $new_treasure;
        $treasure->last_treasure = $last_treasure;
        $treasure->comment = $comment2;
        $treasure->amount = $sadad_to_treasure;

        $treasure->contract_id = $contract_id;
        $treasure->typ =1;
        $treasure->user_id =Auth::user()->id;
        $treasure->save();

    }
    //اذا يوجد خصم مدير
    if($request->man_discount>0){
        $contract_id = contract::latest()->first()->id;
        $contract_man_dis = new man_discount();
        $contract_man_dis->man_discount =$request->man_discount;
        $contract_man_dis->contract_id = $contract_id;
        $contract_man_dis->Created_by = Auth::user()->name;

        $contract_man_dis->save();
    }
// اضافة تحديثات العقد
    $contract_id = contract::latest()->first()->id;
    $contract_history = new contract_history();
    $contract_history->update_reson ='تم اضافة عقد التشغيل';
    $contract_history->contract_id = $contract_id;
    $contract_history->Created_by = Auth::user()->name;

    $contract_history->save();


    $connected_con_id = contract::latest()->first()->id;
    //تغير حالة العاملة الي مربوطة بعقد
    $change_maid_connect = maids::findOrFail($request->emp_id);
    $change_maid_connect->update([


        'connected' =>1,
        'connected_con_id' =>$connected_con_id,


    ]);
    ///////////////////////////

    $contract_id = contract::latest()->first()->id;
    $maid_movmoents = new maid_movmoent();
    $maid_movmoents->maid_name = $request->emp_name;
    $maid_movmoents->maid_id= $request->emp_id;
    $maid_movmoents->contract_id = $contract_id;
    $maid_movmoents->status ='نشط';
    $maid_movmoents->comment = '';
    $maid_movmoents->Created_by = Auth::user()->name;

    $maid_movmoents->save();

    $contract_id = contract::latest()->first()->id;
    $maidHistory = new maidHistory();
    $maidHistory->contract_type = $request->typ;

    $maidHistory->contract_id =$contract_id;
    $maidHistory->maid_id  =$request->emp_id;
    $maidHistory->agents_id  =$request->agent_id;
    $maidHistory->agents_name = $request->agents_name;
    $maidHistory->Duration = $request->countss;
    $maidHistory->str_date = Carbon::now();

    $maidHistory->Created_by = Auth::user()->name;

    $maidHistory->save();

    if ($request->hasFile('pic')) {


        $contract_id = contract::latest()->first()->id;
        $image = $request->file('pic');
        $file_name = $image->getClientOriginalName();
        $contract_number = contract::latest()->first()->id;

        $attachments = new contractAttachments();
        $attachments->file_name = $file_name;
        $attachments->contract_num = contract::latest()->first()->id;
        $attachments->Created_by = Auth::user()->name;
        $attachments->contract_id = $contract_id;
        $attachments->save();

        // move pic
        $imageName = $request->pic->getClientOriginalName();
        $request->pic->move(public_path('Attachments_contract/' . $contract_number), $imageName);

    }
    $contract_id = contract::latest()->first()->id;
   //$user=User::first();
  // Notification::send($user,new mail_contract($contract_id));

    session()->flash('add_contract');

    return redirect('/print_cont/'.$contract_id);


}

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RentController  $rentController
     * @return \Illuminate\Http\Response
     */
    public function show(RentController $rentController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RentController  $rentController
     * @return \Illuminate\Http\Response
     */
    public function edit(RentController $rentController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RentController  $rentController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RentController $rentController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RentController  $rentController
     * @return \Illuminate\Http\Response
     */
    public function destroy(RentController $rentController)
    {
        //
    }
    public function print_contract($id)
    {
        $contract=contract::select('*')->where('id','=',$id)->first();
      return view('rent.print_cont',compact('contract'));
    }

    public function getemp_name($id)
    {


        $products = DB::table("maids")->where("emp_num", $id)->first();

        return json_encode($products);

    }

    public function rent_comment(Request $Request )
    {
        contract_comment::create([
            'comment' => $Request->comment,
            'contract_id' => $Request->id,
            'Created_by' => (Auth::user()->name),

        ]);

        session()->flash('add_comment');

        return redirect('/rent');}

    public function ser_cont($id)
    {
        $contract=contract::select('*')->where('id',$id)->orderBy('id', 'desc')->paginate(7);
        $contract_count=contract::select('*')->where('id',$id)->get();
        $contract_count2=$contract_count->count();
        $nationalities=nationalities::all();
        $careers=careers::select('*')->where('show','=',1)->get();
        $employees=employees::all();

        return view('rent.rent',compact('contract','contract_count2','nationalities','careers','employees','contract_count'));

   }
    public function upd_exp_sada(request $request )
    {
        $change_exp_sadad = contract::findOrFail($request->id);
        $change_exp_sadad->update([



            'exp_sadad' =>$request->exp_sadad2,


        ]);
        $exp1=$request->exp_sadad1;
        $exp2=$request->exp_sadad2;
        $comment='تم تغير تاريخ السداد من '.$exp1.'الي '.$exp2 ;

        contract_comment::create([
            'comment' => $comment,
            'contract_id' => $request->id,
            'Created_by' => (Auth::user()->name),

        ]);



        session()->flash('chang_sadad');

        return redirect('/rent');}






}

