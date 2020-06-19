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

Route::get("404", function(){
    abort(404);
});
Route::get("caddy/allowed-domain", 'CaddyController@index');

    Route::group(['layout'=>'layouts.front'], function(){

        Route::livewire('/', 'user.index')->name("index");
        Route::livewire('/signup', 'user.signup')->name("signup");

});


