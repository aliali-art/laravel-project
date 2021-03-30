<?php

namespace App\Http\Controllers;

use App\recievemessage;
use Illuminate\Http\Request;
use Validator;
use Gate;

class RecievemessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::allows("isAdmin")){
            $recievemessages  = recievemessage::all();
            return view("messages.showmessage",["recievemessages"=>$recievemessages]);
        }
        else{
            return view("errors.error");
        }
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
        $recievemessage  = new recievemessage;
        $data = [
            'firstName' => "required",
            "email"  => "required|email",
            'phone'     => "required",
            'message'  => "required",
        ];
        $check = Validator::make($request->all(),$data);
        if($check->passes()){
            $recievemessage->firstName  = $request->firstName;
            $recievemessage->lastName   = $request->lastName;
            $recievemessage->email      = $request->email;
            $recievemessage->company    = $request->company;
            $recievemessage->phone      = $request->phone;
            $recievemessage->message    = $request->message;
            $recievemessage->country    = $request->country;
            if($recievemessage->save()){
                return Response("success");
            }
            else{
                $request->session()->flash("error","error occord");
                return Response("error");
            }
        }
        else{
            $request->session()->flash("errors",$check->errors());
            return Response("error");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\recievemessage  $recievemessage
     * @return \Illuminate\Http\Response
     */
    public function show(recievemessage $recievemessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\recievemessage  $recievemessage
     * @return \Illuminate\Http\Response
     */
    public function edit(recievemessage $recievemessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\recievemessage  $recievemessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, recievemessage $recievemessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\recievemessage  $recievemessage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::allows("isAdmin")){
            $recievemessages  = recievemessage::find($id);
            $recievemessages->delete();
            return Response($recievemessages);
        }
        else{
            return view("errors.error");
        }
    }
}
