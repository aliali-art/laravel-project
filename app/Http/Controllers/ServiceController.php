<?php

namespace App\Http\Controllers;

use App\service;
use Illuminate\Http\Request;
use Gate;
use Validator;

class ServiceController extends Controller
{
   
    // show public services function
    public function showservice(){
        $services    = service::all();
        return view("services.showservices",compact("services"));
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::allows("isAdmin")){
            $services  = service::all();
            return view("services.service",compact("services"));
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
        if(Gate::allows("isAdmin")){
            $services  = new service;
            $data=[
                'title'  => "required|max:100",
                'da_title'  => "required|max:100",
                "body"   => "required|min:5",
                "da_body"   => "required|min:5",
            ];
            $check  = Validator::make($request->all(),$data);
            if($check->passes()){
                $services->title  = $request->title;
                $services->da_title  = $request->da_title;
                $services->body   = $request->body;
                $services->da_body   = $request->da_body;
                if($services->save()){
                    return back();
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
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Gate::allows("isAdmin")){
            $data = "";
            $services = service::find($id);
            $data = [$services->id,$services->title,$services->da_title,$services->body,$services->da_body];
            return Response($data);
        }
        else{
            return view("errors.error");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Gate::allows("isAdmin")){
            $data=[
                'title'  => "required|max:100",
                'da_title'  => "required|max:100",
                "body"   => "required|min:5",
                "da_body"   => "required|min:5",
            ];
            $services  = service::find($id);
            $check  = Validator::make($request->all(),$data);
            if($check->passes()){
                $services->title  = $request->title;
                $services->da_title  = $request->da_title;
                $services->body   = $request->body;
                $services->da_body   = $request->da_body;
                if($services->save()){
                    return back();
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
     * Remove the specified resource from storage.
     *
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::allows("isAdmin")){
            $services  = service::find($id);
            $services->delete();
            return Response($services);
        }
        else{
            return view("errors.error");
        }
    }
}
