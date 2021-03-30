<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Slideshow;
use App\About;
use Gate;
use Validator;
use App\service;
use App\employee;
use Illuminate\Support\Facades\File;
use App\recievemessage;
use Illuminate\Support\Facades\Session;
use App\Project_demo;

class AboutController extends Controller
{
    public function abouts(){
        $messages  = recievemessage::count();
        if($messages>0){
          Session::put("messages",$messages);
        }
        else{
          Session::put("messages","");
        }
        $slideshows  = Slideshow::all();
        $abouts      = About::all();
        $employees =        employee::with("service")->get();
        $Project_demos  = Project_demo::all();
        $about_slideshow  =[$slideshows,$abouts];
        $services    = service::all();
        $services_employees = [$services,$employees,$Project_demos];
        return view("index",["about_slideshow"=>$about_slideshow],["services_employees"=>$services_employees]);
    }
    //show for public about company
    public function aboutuppertechs(){
        $abouts      = About::all();
        return view("abouts.about",compact("abouts"));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::allows("isAdmin")){
            $abouts  = About::all();
            return view("abouts.showabout",compact("abouts"));
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
            $abouts  = new About;
            $data=[
                'title'  => "required|max:100",
                'da_title'  => "required|max:100",
                "body"   => "required|min:5",
                "da_body"   => "required|min:5",
                "image"  => "required",
            ];
            $check  = Validator::make($request->all(),$data);
            if($check->passes()){
                $abouts->title  = $request->title;
                $abouts->da_title  = $request->da_title;
                $abouts->body   = $request->body;
                $abouts->da_body   = $request->da_body;
                $abouts->image  = $request->image;
                if($abouts->save()){
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
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show($idf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Gate::allows("isAdmin")){
            $data = "";
            $abouts  = About::find($id);
            $data = [$abouts->id,$abouts->title,$abouts->da_title,$abouts->body,$abouts->da_body,$abouts->image];
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
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Gate::allows("isAdmin")){
            $abouts  = About::find($id);
            $image_name  = $abouts->image;
            if($request->image==""){
                 $data=[
                'title'  => "required|max:100",
                'da_title'  => "required|max:100",
                "body"   => "required|min:5",
                "da_body"   => "required|min:5",
            ];
            $check  = Validator::make($request->all(),$data);
            if($check->passes()){
                $abouts->title  = $request->title;
                $abouts->da_title  = $request->da_title;
                $abouts->body   = $request->body;
                $abouts->da_body   = $request->da_body;
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
                $abouts->title  = $request->title;
                $abouts->da_title  = $request->da_title;
                $abouts->body   = $request->body;
                $abouts->da_body   = $request->da_body;
                $abouts->image  = $request->image;
                File::delete('uploads/'.$image_name);
            }
            else{
                $request->session()->flash("errors",$check->errors());
                return back();
            }
            }
            if($abouts->save()){
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
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         if(Gate::allows("isAdmin")){
            $abouts  = About::find($id);
            $image_name = $abouts->image;
            $abouts->delete();
            File::delete('uploads/'.$image_name);
            return Response($abouts);
        }
        else{
            return view("errors.error");
        }
    }
}
