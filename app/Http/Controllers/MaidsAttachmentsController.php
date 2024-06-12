<?php

namespace App\Http\Controllers;

use App\maids;
use App\maids_attachments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaidsAttachmentsController extends Controller
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
     * @param  \App\maids_attachments  $maids_attachments
     * @return \Illuminate\Http\Response
     */
    public function show(maids_attachments $maids_attachments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\maids_attachments  $maids_attachments
     * @return \Illuminate\Http\Response
     */
    public function edit(maids_attachments $maids_attachments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\maids_attachments  $maids_attachments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->hasFile('profile')) {

            $maids_id =$request->id;
            $image = $request->file('profile');
            $file_name = $image->getClientOriginalName();
            $maids_number =$request->id;

            $attachments = new maids_attachments();
            $attachments->file_name = $file_name;
            $attachments->maids_number = $request->id;
            $attachments->Created_by = Auth::user()->name;
            $attachments->maids_id = $maids_id;
            $attachments->save();

            // move pic
            $imageName = $request->profile->getClientOriginalName();
            $request->profile->move(public_path('Attachments_maids/' . $maids_number), $imageName);

            $maids = maids::findOrFail($maids_id);
            $maids->update([

                'file_name' => $file_name,



            ]);
        }
        if ($request->hasFile('passport_pic')) {

            $maids_id = $request->id;
            $image = $request->file('passport_pic');
            $file_name = $image->getClientOriginalName();
            $maids_number = $request->id;

            $attachments = new maids_attachments();
            $attachments->file_name = $file_name;
            $attachments->maids_number = $request->id;
            $attachments->Created_by = Auth::user()->name;
            $attachments->maids_id = $maids_id;
            $attachments->save();

            // move pic
            $imageName = $request->passport_pic->getClientOriginalName();
            $request->passport_pic->move(public_path('Attachments_maids_pass/' . $maids_number), $imageName);

            $maids = maids::findOrFail($maids_id);
            $maids->update([

                'passport_pic' => $file_name,



            ]);
        }

        if ($request->hasFile('full_pic')) {

            $maids_id = $request->id;
            $image = $request->file('full_pic');
            $file_name = $image->getClientOriginalName();
            $maids_number =$request->id;

            $attachments = new maids_attachments();
            $attachments->file_name = $file_name;
            $attachments->maids_number = $request->id;
            $attachments->Created_by = Auth::user()->name;
            $attachments->maids_id = $maids_id;
            $attachments->save();

            // move pic
            $imageName = $request->full_pic->getClientOriginalName();
            $request->full_pic->move(public_path('Attachments_maids_full/' . $maids_number), $imageName);

            $maids = maids::findOrFail($maids_id);
            $maids->update([

                'full_pic' => $file_name,



            ]);
        }




        session()->flash('Add', 'تم رفع صور عاملة بنجاح');
        return redirect('/maids');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\maids_attachments  $maids_attachments
     * @return \Illuminate\Http\Response
     */
    public function destroy(maids_attachments $maids_attachments)
    {
        //
    }
}
