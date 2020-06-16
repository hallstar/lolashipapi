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

Route::get("404", function(){
    return view("notfound");
})->name("404");

Route::group(['middleware'=>'tenant'], function(){
        Route::get('/', function(){
            return "hello";
        });

});
