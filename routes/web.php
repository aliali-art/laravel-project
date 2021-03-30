<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('uppertechs', 'AboutController@abouts');
// about
Route::resource("/abouts","AboutController");
Route::get("/aboutuppertechs","AboutController@aboutuppertechs");
Route::get("/localize/{lang}","LocalizationController@setLang");
Route::get("/upp_login_admin","UserController@index");
Route::post("/loginuser","UserController@loginuser");
Route::get("/logout_u_user","UserController@logout_u_user");
// Route for slide show 
Route::resource("/slideshows","SlideshowController");
// Route for services
Route::resource("/services","ServiceController");
Route::get("/ourservices","ServiceController@showservice");
// Employees route
Route::resource("/employees","EmployeeController");
Route::get("/ourdevelopers","EmployeeController@ourdeveloper");
// Image 
Route::match(['get', 'post'], 'ajax-image-upload', 'ImageuploadController@image_upload');
Route::match(['get','post'],'image_upload','ImageuploadController@image_upload');
Route::delete('ajax-remove-image/{filename}', 'ImageuploadController@deleteImage');
// Request Controller
Route::resource("/recievemessage","RecievemessageController");
// Route for projectdemo
Route::resource("/project_demos","projectDemoController");

