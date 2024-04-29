<?php

namespace App\Http\Controllers;

use App\agents;
use App\careers;
use App\contract;
use App\employees;
use App\maidHistory;
use App\maids;
use App\maids_attachments;
use App\nationalities;
use App\wakel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaidsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $maids=maids::select('*')->orderBy('id', 'desc')->paginate(7);
        $maids_count=maids::all();
        $maids_count2=$maids_count->count();
return view('maids.maids',compact('maids','maids_count2'));
    }


    public function Search_maids(Request $request )
    {
        $maids_count = maids::select('*')->where('emp_num', '=', $request->emp_num)->get();
        $maids_count2=$maids_count->count();
        $maids = maids::select('*')->where('emp_num', '=', $request->emp_num)->paginate(7);

        return  view('maids.maids',compact('maids','maids_count2'));

    }
    public function showDetails($id)
    {
        $maidHistory=maidHistory::where('maid_id', $id)->get();
        $maids=maids::where('id', $id)->first();
        return view('maids.maids_detils',compact('maids','maidHistory'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $careers=careers::all();
        $employees=employees::all();
        $nationalities=nationalities::all();
        $wakel=wakel::all();
        return view('maids.add_maids',compact('careers','employees','nationalities','wakel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->emp_is_work==1){
            $emp_is_wrk='نعم';
        }
            else{
                $emp_is_wrk='لا';
            }
        $validatedData = $request->validate([
            'emp_num' => 'required|unique:maids|max:255',

        ],[

            'emp_num.unique' =>'رقم العاملة مسجل مسبقآ',
            'emp_num.required' =>'رقم العاملة مطلوب ',

        ]);


        maids::create([
            //المعلومات الاساسية
            'emp_num' => $request->emp_num,
            'emp_name_ar' => $request->emp_name_ar,
            'emp_name_en' => $request->emp_name_en,
            'emp_relegon' => $request->emp_relegon,
            'emp_work' => $request->emp_work,
            'emp_gender' => $request->emp_gender,
            'emp_nash' => $request->emp_nash,
            'emp_salary' => $request->emp_salary,
            'emp_wakel' => $request->emp_wakel,
            'emp_employee' => $request->emp_employee,
            'emp_box_num' => $request->emp_box_num,
            'emp_hodod_num' => $request->emp_hodod_num,
            'status' => 'داخل الايواء',
            'status_id' => '0',
            'connected' => '0',
            // البيانات الشخصية
            'age_date' => $request->age_date,
            'age' => $request->age,
            'emp_add_ar' => $request->emp_add_ar,
            'emp_add_en' => $request->emp_add_en,
            'emp_m_status' => $request->emp_m_status,
            'emp_num_of_ch' => $request->emp_num_of_ch,
            'emp_weight' => $request->emp_weight,
            'emp_length' => $request->emp_length,
            'emp_edu_ar' => $request->emp_edu_ar,
            'emp_edu_en' => $request->emp_edu_en,
            'emp_phone' => $request->emp_phone,
            'emp_phone2' => $request->emp_phone2,
            'emp_id_num' => $request->emp_id_num,
            //  معلومات الجواز
            'emp_passport' => $request->emp_passport,
            'emp_passport_date' => $request->emp_passport_date,
            'emp_passport_end_date' => $request->emp_passport_end_date,
            'emp_isdar_ar' => $request->emp_isdar_ar,
            'emp_name_of_ahal_ar' => $request->emp_name_of_ahal_ar,
            'emp_name_of_ahal_en' => $request->emp_name_of_ahal_en,
            'emp_name_of_ahal_phne' => $request->emp_name_of_ahal_phne,
            'emp_isdar_en' => $request->emp_isdar_en,
            //   خبرات سابقة
            'emp_is_work' => $emp_is_wrk,
            //   المهارات
            'emp_cook' => $request->emp_cook,
            'emp_wash' => $request->emp_wash,
            'emp_clean' => $request->emp_clean,
            'emp_children' => $request->emp_children,
            'emp_tilor' => $request->emp_tilor,
            'emp_drive' => $request->emp_drive,
            //   اللغات
            'emp_arabic_lan' => $request->emp_arabic_lan,
            'emp_english_lan' => $request->emp_english_lan,
            //   المعلومات الاضافية
            'emp_type' => $request->emp_type,
            'Created_by' => Auth::user()->name,

        ]);
        if ($request->hasFile('profile')) {

            $maids_id = maids::latest()->first()->id;
            $image = $request->file('profile');
            $file_name = $image->getClientOriginalName();
            $maids_number = maids::latest()->first()->id;

            $attachments = new maids_attachments();
            $attachments->file_name = $file_name;
            $attachments->maids_number = maids::latest()->first()->id;
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

            $maids_id = maids::latest()->first()->id;
            $image = $request->file('passport_pic');
            $file_name = $image->getClientOriginalName();
            $maids_number = maids::latest()->first()->id;

            $attachments = new maids_attachments();
            $attachments->file_name = $file_name;
            $attachments->maids_number = maids::latest()->first()->id;
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

            $maids_id = maids::latest()->first()->id;
            $image = $request->file('full_pic');
            $file_name = $image->getClientOriginalName();
            $maids_number = maids::latest()->first()->id;

            $attachments = new maids_attachments();
            $attachments->file_name = $file_name;
            $attachments->maids_number = maids::latest()->first()->id;
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




        session()->flash('Add', 'تم اضافة عاملة بنجاح');
        return redirect('/maids');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\maids  $maids
     * @return \Illuminate\Http\Response
     */
    public function show(maids $maids)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\maids  $maids
     * @return \Illuminate\Http\Response
     */
    public function edit(maids $maids)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\maids  $maids
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, maids $maids)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\maids  $maids
     * @return \Illuminate\Http\Response
     */
    public function destroy(maids $maids)
    {
        //
    }
}
