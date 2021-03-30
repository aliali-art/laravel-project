<?php

namespace App\Http\Controllers;

use App\employee;
use Illuminate\Http\Request;
use Gate;
use App\service;
use Validator;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ourdeveloper(){
        $employees =        employee::with("service")->get();
        return view("employees.ourdeveloper",compact("employees"));
    }
    public function index()
    {
        if(Gate::allows("isAdmin")){
            $employees  = employee::all();
            return view("employees.showemployee",['employees'=>$employees]);
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
        if(Gate::allows("isAdmin")){
            $services  = service::all();
            return view("employees.insertEmployee",["services"=>$services]);
        }
        else{
            return view("errors.error");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Gate::allows("isAdmin")){
            $employees  = new employee;
            $data = [
                'firstname'  => "required",
                'da_firstname'  => "required",
                "image_name"  => "required",
                "service_id" => "required",
            ];
            $check = Validator::make($request->all(),$data);
            if($check->passes()){
                $employees->firstName = $request->firstname;
                $employees->da_firstName = $request->da_firstname;
                $employees->lastName  = $request->lastname;
                $employees->da_lastName  = $request->da_lastname;
                $employees->image     = $request->image_name;
                $employees->feature_work=$request->feturework;
                $employees->da_feature_work=$request->da_feturework;
                $employees->service_id= $request->service_id;
                $employees->register_date= $request->register_date;
                $employees->salary    = $request->salary;
                if($employees->save()){
                    $request->session()->flash("success","Successfully registered");
                    return redirect("/employees");
                }
                else{
                    $request->session()->flash("error","Do not registered error occored");
                }
            }
            else{
                $request->session()->flash("errors",$check->errors());
                return back();
            }
        }
        else{
            return view("errors.error");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Gate::allows("isAdmin")){
            $employees   = employee::find($id);
            $services    = service::all();
            return view("employees.editEmployee",["employees"=>$employees],['services'=>$services]);
        }
        else{
            return view("errors.error");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Gate::allows("isAdmin")){
            $employees  = employee::find($id);
            $image_name  = $employees->image;
            $data = [
                'firstname'  => "required",
                'da_firstname'  => "required",
                "service_id" => "required",
            ];
            if($request->image_name==""){
                $check = Validator::make($request->all(),$data);
            if($check->passes()){
                $employees->firstName = $request->firstname;
                $employees->da_firstName = $request->da_firstname;
                $employees->lastName  = $request->lastname;
                $employees->da_lastName  = $request->da_lastname;
                $employees->feature_work=$request->feturework;
                $employees->da_feature_work=$request->da_feturework;
                $employees->service_id= $request->service_id;
                $employees->register_date= $request->register_date;
                $employees->salary    = $request->salary;
                if($employees->save()){
                    $request->session()->flash("success","Successfully registered");
                    return redirect("/employees");
                }
                else{
                    $request->session()->flash("error","Do not registered error occored");
                    return back();
                }
            }
            else{
                $request->session()->flash("errors",$check->errors());
                return back();
            }
            }
            else{
                $check = Validator::make($request->all(),$data);
            if($check->passes()){
                $employees->firstName = $request->firstname;
                $employees->da_firstName = $request->da_firstname;
                $employees->lastName  = $request->lastname;
                $employees->da_lastName  = $request->da_lastname;
                $employees->image     = $request->image_name;
                $employees->feature_work=$request->feturework;
                $employees->da_feature_work=$request->da_feturework;
                $employees->service_id= $request->service_id;
                $employees->register_date= $request->register_date;
                $employees->salary    = $request->salary;
                if($employees->save()){
                    File::delete('uploads/'.$image_name);
                    $request->session()->flash("success","Successfully registered");
                    return redirect("/employees");
                }
                else{
                    $request->session()->flash("error","Do not registered error occored");
                    return back();
                }
            }
            else{
                $request->session()->flash("errors",$check->errors());
                return back();
            }
            }
        }
        else{
            return view("errors.error");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::allows("isAdmin")){
            $employees    = employee::find($id);
            $image_name   = $employees->image;
            File::delete('uploads/'.$image_name);
            $employees->delete();
            return back();
        }
        else{
            return view("errors.error");
        }
    }
}
