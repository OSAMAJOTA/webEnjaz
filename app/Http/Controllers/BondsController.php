<?php

namespace App\Http\Controllers;

use App\Bonds;
use App\contract;
use App\contract_history;
use App\user_treasure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\DependencyInjection\AddAnnotatedClassesToCachePass;

class BondsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        $bonds=Bonds::select('*')->orderBy('id', 'desc')->paginate(7);
        $bonds_count=Bonds::all();
        $bonds_count2=$bonds_count->count();
      return view('bonds.general_bonds',compact('bonds','bonds_count2'));
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
        if($request->sadad_cont>0){



            $name_agent=$request->agents_name;
            $total=$request->sadad_cont;
            $typ=$request->sadad_typ;
            $con_id=$request->contract_id;
            $comment_bonds='متبقي عقد تشغيل رقم'.' '.$con_id.' '.'عن العميل'. ' '.$name_agent.' '.'باجمالي مبلغ'.' '.$total.' '.'طريقة السداد'.' '.$typ;
            $bonds = new Bonds();
            $bonds->bonds_type = 'سند قبض عقد';
            $bonds->bonds_type_id = 1;
            $bonds->catch_type = $request->sadad_typ;
            $bonds->bonds_vat = $request->sadad_vat;
            $bonds->bonds_cost = $request->sadad_co;
            $bonds->bonds_total = $request->sadad_cont;

            $bonds->bonds_vat_ar = $request->sadad_vat_ar;
            $bonds->bonds_cost_ar = $request->sadad_co_ar;
            $bonds->bonds_total_ar = $request->sadad_ar;


            $bonds->comment  = $comment_bonds;

            $bonds->contract_id  = $request->contract_id;
            $bonds->Created_by = Auth::user()->name;

            $bonds->save();
        }
        //اذا كان السداد اكبر من ال0

        if ($request->sadad_cont>0)
        {
            //تعديل مبلغ الخزنة

            $contrcat = contract::where('id',$con_id)->first();
            $last_sadad=$contrcat->sadad;
            $this_sadad=$request->sadad_cont;
            $new_sadad=$last_sadad+$this_sadad;

            $contrcat->update([


                'rest' =>$request->rest_in_cont,
                'sadad'=>$new_sadad,

            ]);
        }


        // في حالة كان سند القبض نقدآ

        if ($request->sadad_typ=='نقدآ')
        {
            //تعديل مبلغ الخزنة

            $treasure = user_treasure::where('user_id',Auth::user()->id)->first();
            $last_treasure=$treasure->treasure;

            $sadad_to_treasure=$request->sadad_cont;
            $new_treasure=$last_treasure+$sadad_to_treasure;
            $treasure->update([


                'treasure' =>$new_treasure,

            ]);
        }
        session()->flash('add_bonds');
        return redirect('/contract_detils/'.$con_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bonds  $bonds
     * @return \Illuminate\Http\Response
     */
    public function show(Bonds $bonds)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bonds  $bonds
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bonds=Bonds::select('*')->where('id',$id)->first();

      return view('bonds.bonds_detils',compact('bonds'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bonds  $bonds
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bonds $bonds)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bonds  $bonds
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bonds $bonds)
    {
        //
    }

    public function pay_penalty(request $request)
    {
        if($request->sadad>0){



            $name_agent=$request->agents_name;
            $total=$request->sadad;
            $typ=$request->catch_type;
            $con_id=$request->id;
            $comment_bonds='غرامة تأخير عقد تشغيل رقم'.' '.$con_id.' '.'عن العميل'. ' '.$name_agent.' '.'باجمالي مبلغ'.' '.$total.' '.'طريقة السداد'.' '.$typ;
            $bonds = new Bonds();
            $bonds->bonds_type = 'سند قبض عقد';
            $bonds->bonds_type_id = 1;
            $bonds->catch_type = $request->catch_type;
            $bonds->bonds_vat = $request->sadad_vat;
            $bonds->bonds_cost = $request->sadad_co;
            $bonds->bonds_total = $request->sadad;

            $bonds->bonds_vat_ar = $request->sadad_vat_ar;
            $bonds->bonds_cost_ar = $request->sadad_co_ar;
            $bonds->bonds_total_ar = $request->sadad_ar;


            $bonds->comment  = $comment_bonds;

            $bonds->contract_id  = $request->id;
            $bonds->Created_by = Auth::user()->name;

            $bonds->save();




        }

        if ($request->sadad>0)
        {
            //تعديل مبلغ الخزنة

            $contrcat = contract::where('id',$request->id)->first();
            $last_sadad=$contrcat->late_cost;
            $this_sadad=$request->sadad;
            $new_sadad=$last_sadad-$this_sadad;

            $contrcat->update([



                'late_cost'=>$new_sadad,

            ]);

            $contract_history = new contract_history();
            $contract_history->update_reson ='تم   دفع غرامة تأخير  عقد التشغيل';
            $contract_history->contract_id = $request->id;
            $contract_history->Created_by = Auth::user()->name;

            $contract_history->save();

        }
        session()->flash('late_bonds');
        return back();
    }



    public function pay_return(request $request)
    {
        if($request->sadad1>0){



            $name_agent=$request->agents_name;
            $total=$request->sadad1;
            $typ=$request->catch_type1;
            $con_id=$request->id;
            $comment_bonds=' استردات متبقي ايام عقد تشغيل رقم'.' '.$con_id.' '.'عن العميل'. ' '.$name_agent.' '.'باجمالي مبلغ'.' '.$total.' '.'طريقة السداد'.' '.$typ;
            $bonds = new Bonds();
            $bonds->bonds_type = 'سند صرف عقد';
            $bonds->bonds_type_id = 2;
            $bonds->catch_type = $request->catch_type1;
            $bonds->bonds_vat = $request->sadad_vat1;
            $bonds->bonds_cost = $request->sadad_co1;
            $bonds->bonds_total = $request->sadad1;

            $bonds->bonds_vat_ar = $request->sadad_vat_ar1;
            $bonds->bonds_cost_ar = $request->sadad_co_ar1;
            $bonds->bonds_total_ar = $request->sadad_ar1;


            $bonds->comment  = $comment_bonds;

            $bonds->contract_id  = $request->id;
            $bonds->Created_by = Auth::user()->name;

            $bonds->save();




        }
        if ($request->sadad1>0)
        {
            //تعديل مبلغ الخزنة

            $contrcat = contract::where('id',$request->id)->first();
            $last_return_cost=$contrcat->return_cost;
            $this_return_cost=$request->sadad1;
            $new_return_cost=$last_return_cost-$this_return_cost;

            $contrcat->update([



                'return_cost'=>$new_return_cost,

            ]);

            $contract_history = new contract_history();
            $contract_history->update_reson ='تم  استرداد مبلغ للعميل عن الايام المتبقية في عقد التشغيل';
            $contract_history->contract_id = $request->id;
            $contract_history->Created_by = Auth::user()->name;

            $contract_history->save();

        }

        session()->flash('return_bonds');
        return back();

        return back();
    }



}
