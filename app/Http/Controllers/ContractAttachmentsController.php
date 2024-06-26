<?php

namespace App\Http\Controllers;

use App\companys_attachments;
use App\contractAttachments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContractAttachmentsController extends Controller
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
        $this->validate($request, [

            'file_name' => 'mimes:pdf,jpeg,png,jpg',

        ], [
            'file_name.mimes' => 'صيغة المرفق يجب ان تكون   pdf, jpeg , png , jpg',
        ]);

        $image = $request->file('file_name');
        $file_name = $image->getClientOriginalName();

        $attachments =  new contractAttachments();
        $attachments->file_name = $file_name;
        $attachments->contract_num = $request->contract_num;
        $attachments->contract_id = $request->contract_id;
        $attachments->Created_by = Auth::user()->name;
        $attachments->save();

        // move pic
        $imageName = $request->file_name->getClientOriginalName();
        $request->file_name->move(public_path('Attachments_contract/'. $request->contract_num), $imageName);

        session()->flash('Add', 'تم اضافة المرفق بنجاح');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\contractAttachments  $contractAttachments
     * @return \Illuminate\Http\Response
     */
    public function show(contractAttachments $contractAttachments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\contractAttachments  $contractAttachments
     * @return \Illuminate\Http\Response
     */
    public function edit(contractAttachments $contractAttachments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\contractAttachments  $contractAttachments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contractAttachments $contractAttachments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\contractAttachments  $contractAttachments
     * @return \Illuminate\Http\Response
     */
    public function destroy(contractAttachments $contractAttachments)
    {
        //
    }
}
