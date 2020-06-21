<?php

/*
|--------------------------------------------------------------------------
| Client web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//add is active middleware to native routes
Route::get("/", 'ClientController@index');

Route::get("/register", function(){

    return "Customer register on client side";
});

Route::group(['middleware'=>'onboard', 'layout'=>'layouts.client'], function(){
    Route::livewire('/onboard', 'user.onboard')->name("onboard");
});

