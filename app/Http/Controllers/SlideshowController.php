<?php

namespace App\Http\Controllers;

use App\Slideshow;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Gate;


class SlideshowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::allows("isAdmin")){
            return view("slideshow.slideshow");
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
            $slideshow   = new Slideshow;
            $data  =  [
                "slide_image"  => "required",
            ];
            $check   =  Validator::make($request->all(),$data);
            if($check->passes()){
                $slideshow->slide_title   = $request->slide_title;
                $slideshow->da_slide_title      = $request->da_slide_title;
                $slideshow->slide_image              = $request->slide_image;
                if($slideshow->save()){
                    return back();
                }
            }
            else{
                return view("slideshow.slideshow",["errors"=>$check->errors()]);
            }
        }
        else{
            return view("errors.error");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slideshow  $slideshow
     * @return \Illuminate\Http\Response
     */
    public function show(Slideshow $slideshow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slideshow  $slideshow
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Gate::allows("isAdmin")){
            $slideshow  = Slideshow::find($id);
            return view("slideshow.editslideshow",['slideshow'=>$slideshow]);
        }
        else{
            return view("errors.error");
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slideshow  $slideshow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Gate::allows("isAdmin")){
            $slideshow  = Slideshow::find($id);
            $image_name  = $slideshow->slide_image;
            if($request->slide_image==""){
                $slideshow->slide_title  = $request->slide_title;
                $slideshow->da_slide_title      = $request->da_slide_title;
                if($slideshow->save()){
                    return redirect("/uppertechs");
                }
            }
            else{
             $data  =  [
                "slide_image"  => "required",
            ];
            $check   =  Validator::make($request->all(),$data);
            if($check->passes()){
                $slideshow->slide_title   = $request->slide_title;
                $slideshow->da_slide_title      = $request->da_slide_title;
                $slideshow->slide_image              = $request->slide_image;
                if($slideshow->save()){
                    File::delete("uploads/".$image_name);
                    return redirect("/uppertechs");
                }
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
     * @param  \App\Slideshow  $slideshow
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::allows("isAdmin")){
            $slideshow  = Slideshow::find($id);
            $image_name = $slideshow->slide_image;
            File::delete("uploads/".$image_name);
            $slideshow->delete();
            return Response($slideshow);
        }
        else{
            return view("errors.error");
        }
    }
}
