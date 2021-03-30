<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use Validator;
use App\User;
use Auth;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
            return view("users.loginuser");
        
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
    // function for login user
    public function loginuser(Request $request){
        $data = [
            'email' => "required|email",
            "password" => "required|min:5",
        ];
        $check  = Validator::make($request->all(),$data);
        if($check->passes()){
            $value  = [
                "email" => $request->email,
                "password" => $request->password,
            ];
            if(auth::attempt($value)){
                return redirect("/uppertechs");
            }
            else{
                $request->session()->flash("error","public.incorrectlogin");
                return back();
            }
        }
        else{
            return view("users.loginuser",['errors'=>$check->errors()]);
        }
    }
    // function for logout
    public function logout_u_user(){
        Auth::logout();
        return redirect("/uppertechs");
    }

}
