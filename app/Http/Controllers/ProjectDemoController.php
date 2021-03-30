<?php

namespace App\Http\Controllers;

use App\Project_demo;
use Illuminate\Http\Request;
use Gate;
use Validator;
use Illuminate\Support\Facades\File;

class ProjectDemoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::allows("isAdmin")){
            $project_demos = Project_demo::all();
            return view("project_demos.showprojectdemo",compact("project_demos"));
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
            $project_demos  = new Project_demo;
            $data=[
                'title'  => "required|max:100",
                'da_title'  => "required|max:100",
            ];
            $check  = Validator::make($request->all(),$data);
            if($check->passes()){
                $project_demos->title  = $request->title;
                $project_demos->da_title  = $request->da_title;
                $project_demos->body   = $request->body;
                $project_demos->da_body   = $request->da_body;
                $project_demos->quantity = $request->quantity;
                $project_demos->image  = $request->image;
                if($project_demos->save()){
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
     * @param  \App\Project_demo  $project_demo
     * @return \Illuminate\Http\Response
     */
    public function show(Project_demo $project_demo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project_demo  $project_demo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Gate::allows("isAdmin")){
            $data = "";
            $project_demos  = project_demo::find($id);
            $data = [$project_demos->id,$project_demos->title,$project_demos->da_title,$project_demos->body,$project_demos->da_body,$project_demos->quantity,$project_demos->image];
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
     * @param  \App\Project_demo  $project_demo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Gate::allows("isAdmin")){
            $project_demos  = Project_demo::find($id);
            $image_name  = $project_demos->image;
            if($request->image==""){
                 $data=[
                'title'  => "required|max:100",
                'da_title'  => "required|max:100",
            ];
            $check  = Validator::make($request->all(),$data);
            if($check->passes()){
                $project_demos->title  = $request->title;
                $project_demos->da_title  = $request->da_title;
                $project_demos->body   = $request->body;
                $project_demos->da_body   = $request->da_body;
                $project_demos->quantity = $request->quantity;
            }
            else{
                $request->session()->flash("errors",$check->errors());
                return back();
            }
            }
            else{
              $data=[
                'title'  => "required",
                "body"   => "required|min:5",
            ];
            $check  = Validator::make($request->all(),$data);
            if($check->passes()){
                $project_demos->title  = $request->title;
                $project_demos->da_title  = $request->da_title;
                $project_demos->body   = $request->body;
                $project_demos->da_body   = $request->da_body;
                $project_demos->quantity  = $request->quantity;
                $project_demos->image  = $request->image;
                File::delete('uploads/'.$image_name);
            }
            else{
                $request->session()->flash("errors",$check->errors());
                return back();
            }
            }
            if($project_demos->save()){
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
     * @param  \App\Project_demo  $project_demo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         if(Gate::allows("isAdmin")){
            $project_demos  = Project_demo::find($id);
            $image_name = $project_demos->image;
            $project_demos->delete();
            File::delete('uploads/'.$image_name);
            return Response($project_demos);
        }
        else{
            return view("errors.error");
        }
    }
}
