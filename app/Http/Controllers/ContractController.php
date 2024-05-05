<?php

namespace App\Http\Controllers;

use App\contract;
use App\contract_comment;
use App\contract_history;
use App\contractAttachments;
use App\maid_movmoent;
use App\man_discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $contract = contract::where('id', $id)->first();
        $maid_movment=maid_movmoent::where('contract_id', $id)->get();

        $attachments = contractAttachments::where('contract_id', $id)->get();
       return view('rent.detils',compact('contract','attachments','comment','maid_movment','history','man_discount'));
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

}
