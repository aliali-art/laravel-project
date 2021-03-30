<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Validator;
use Gate;

class ImageuploadController extends Controller
{
    public function image_upload(Request $request){
	     if(Gate::allows("isAdmin")){
	        if ($request->isMethod('get'))
	            return view('ajax_image_upload');
	        else {
	            $validator = Validator::make($request->all(),
	                [
	                    'file' => 'image',
	                ],
	                [
	                    'file.image' => 'فایل شما باید یکی ار این ها باشد (jpeg, png, bmp, gif, or svg)'
	                ]);
	            if ($validator->fails())
	                return array(
	                    'fail' => true,
	                    'errors' => $validator->errors()
	                );
	            $extension = $request->file('file')->getClientOriginalExtension();
	            $dir = 'uploads/';
	            $filename = uniqid() . '_' . time() . '.' . $extension;
	            
	            $request->file('file')->move($dir, $filename);
	            return $filename;
	        }
	     }
	     else{
	     	return view("errors.error");
	     }
    }
    public function deleteImage($filename)
    {
    	if(Gate::allows("isAdmin")){
        	File::delete('uploads/' . $filename);
        }
        else{
        	return view("errors.error");
        }
    }
}
