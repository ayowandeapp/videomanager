<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\ActivateUserAccount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function welcome(){
      return view('welcome');
    }

    public function verify($token){
        $user = User::where('activation_token',$token);
        if($user->count() >0){
            $userDetail = $user->first();
            if($userDetail->is_active == 1){
                //return redirect('login-register')->with('message_error','Account as already been Activated. Kindly Login');
            }else{
                $user->update(['is_active'=>1, 'activation_token'=>'']);
                Auth::login($userDetail);
                return redirect('/home')->with('message_success','Account as been Activated. Kindly Login');
            }

        }else{
            abort(404);
        }

    }

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
