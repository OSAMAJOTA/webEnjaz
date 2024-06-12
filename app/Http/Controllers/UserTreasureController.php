<?php

namespace App\Http\Controllers;

use App\User;
use App\user_treasure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserTreasureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users_id = User::select("*")
            ->whereNotNull('last_seen')
            ->orderBy('last_seen', 'DESC')
            ->get();
      return view('treasures.treasures',compact('users_id'));
    }

    public function All_treasures($id)
    {
   $procsess=user_treasure::where('user_id',$id)->latest()->get();
$users=User::where('id',$id)->first();
        $users_name=$users->name;

      return view('treasures.All_treasures',compact('procsess','users_name'));
    }
    public function tranfer_mony(Request $request)
    {

        if ($request->balance>0)
        {

$sender_id=$request->sender_id;
            $users = User::select('*')->where('id',$sender_id)->first();
$user_name=$users->name;

          //تحويل من حساب الموظف الي حساب اخر
            $id=$request->user_id;
            $treasure1 = user_treasure::select('*')->where('user_id',$id)->latest('created_at')->first();
            $last_treasure=$treasure1->treasure;
            $sadad_to_treasure=$request->balance;
            $new_treasure=$last_treasure+$sadad_to_treasure;
            $comment2= '  تحويل وارد من  حساب '.' '.$user_name.' '.'الي حسابك بجمالي مبلغ '.$sadad_to_treasure.' '.'سبب التحويل'.' '.$request->transaction_reson;

            $treasure = new user_treasure();
            $treasure->treasure = $new_treasure;
            $treasure->last_treasure = $last_treasure;
            $treasure->comment = $comment2;
            $treasure->amount = $sadad_to_treasure;
            $treasure->contract_id = null;
            $treasure->typ =2;
            $treasure->user_id =$request->user_id;
            $treasure->save();



            //خصم مبلغ التحويل من رصيد الموظف
            $users1 = User::select('*')->where('id',$id)->first();
            $user_name1=$users1->name;

            $sender = user_treasure::select('*')->where('user_id',$sender_id)->latest('created_at')->first();
            $last_treasure1=$sender->treasure;
            $discount=$request->balance;
            $new_treasure1=$last_treasure1-$discount;
            $comment22= '  تحويل صادر من  حسابك الي حساب '.' '.$user_name1.' '.'  بجمالي مبلغ '.$discount.' '.'سبب التحويل'.' '.$request->transaction_reson;

            $treasure = new user_treasure();
            $treasure->treasure = $new_treasure1;
            $treasure->last_treasure = $last_treasure1;
            $treasure->comment = $comment22;
            $treasure->amount = $discount;

            $treasure->contract_id = null;
            $treasure->typ =3;
            $treasure->user_id =$sender_id;
            $treasure->save();
            session()->flash('transfer_done');

            return redirect()->back();
        }
        session()->flash('transfer_error');

        return redirect()->back();

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
     * @param  \App\user_treasure  $user_treasure
     * @return \Illuminate\Http\Response
     */
    public function show(user_treasure $user_treasure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user_treasure  $user_treasure
     * @return \Illuminate\Http\Response
     */
    public function edit(user_treasure $user_treasure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user_treasure  $user_treasure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user_treasure $user_treasure)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user_treasure  $user_treasure
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_treasure $user_treasure)
    {
        //
    }
}
