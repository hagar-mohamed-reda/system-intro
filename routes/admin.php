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
//exit();

// remote post login
Route::get('/remote', 'Dashboard\StudentRemoteLoginController@login')->name('remoteLogin');


//********************************************
// dashboard routes
//********************************************
// check if user login
 
Route::group(["middleware" => "student"], function() {
    
    Route::get("students/", "dashboard\DashboardController@index");
    Route::get("/", "dashboard\DashboardController@index"); 
    
});
 
Route::group(["middleware" => "admin"], function() {

    Route::get("dashboard/", "dashboard\DashboardController@index");
    Route::get("dashboard/main", "dashboard\DashboardController@main");
 
    // profile routes
    Route::get("dashboard/profile", "dashboard\ProfileController@index");
});

// complaint
Route::post("dashboard/complain/store", "dashboard\ComplainController@store");

// auth route
//Route::get("students", "dashboard\LoginController@studentLogin");
Route::get("students/login", "dashboard\LoginController@studentLogin");
Route::get("dashboard/login", "dashboard\LoginController@index");
Route::post("dashboard/login", "dashboard\LoginController@login");
Route::post("dashboard/register", "dashboard\LoginController@register");
Route::post("dashboard/forget-password", "dashboard\LoginController@forgetPassword");
Route::post("dashboard/confirm-account", "dashboard\LoginController@confirmAccount");
Route::get("dashboard/logout", "dashboard\LoginController@logout");


Route::get("notify", "dashboard\NotificationController@get");
 