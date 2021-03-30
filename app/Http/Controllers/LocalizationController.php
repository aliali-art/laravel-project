<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class LocalizationController extends Controller
{
    public function setLang($lang){
    	App::setLocale($lang);
    	Session::put("lang",$lang);
    	Log::info(App::getLocale());
    	return redirect()->back();
    }
}
