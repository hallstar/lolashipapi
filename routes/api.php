<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace ('\App\Http\Controllers\Api\V1')->prefix('v1')->group(function () {

    Route::get('/', 'HomeController@index');

    // Admin routes
    Route::namespace('Admin')->prefix('admin')->group(function () {

        Route::namespace('Auth')->prefix('auth')->group(function () {
            // Admin login routes
            Route::post('login', 'LoginController@login')->name('login');
            Route::get('refresh-token', 'LoginController@refresh');
            Route::get('logout', 'LoginController@logout');

            Route::post('forgot', 'LoginController@forget');
            Route::get('check-token/{token}', 'LoginController@checkToken');
            Route::put('password-reset', 'LoginController@passwordReset');
        });

        // Admin user routes
        Route::namespace('User')->middleware(['auth:admin'])->group(function () {

            Route::prefix("user")->group(function () {
                Route::get("me", "UserProfileController@me");
            });

            Route::prefix("users")->group(function () {
                Route::get("", "UserController@index")->middleware(['permission:user_access']);
                Route::get("{id}", "UserController@show")->middleware(['permission:user_show']);
                Route::post("", "UserController@store")->middleware(['permission:user_create']);
                Route::put("{id}", "UserController@update")->middleware(['permission:user_edit']);
                Route::delete("{id}", "UserController@delete")->middleware(['permission:user_delete']);
            });

            Route::prefix("permissions")->middleware(['auth:admin'])->group(function(){
                Route::get("", "PermissionController@index")->middleware(['permission:permission_access']);
                Route::get("{id}", "PermissionController@show")->middleware(['permission:permission_show']);
                Route::post("", "PermissionController@store")->middleware(['permission:permission_create']);
                Route::put("{id}", "PermissionController@update")->middleware(['permission:permission_edit']);
                Route::delete("{id}", "PermissionController@delete")->middleware(['permission:permission_delete']);
            });

            Route::prefix("roles")->middleware(['auth:admin'])->group(function(){
                Route::get("", "RoleController@index")->middleware(['permission:role_access']);
                Route::get("{id}", "RoleController@show")->middleware(['permission:role_show']);
                Route::post("", "RoleController@store")->middleware(['permission:role_create']);
                Route::put("{id}", "RoleController@update")->middleware(['permission:role_edit']);
                Route::delete("{id}", "RoleController@delete")->middleware(['permission:role_delete']);
            });
        });

        Route::namespace("ContactUs")->prefix("contact_us")->middleware(['auth:admin'])->group(function(){
            Route::get("", "ContactUsController@index");
            Route::get("{id}", "ContactUsController@show");
        });

    
        // Upload route
        Route::namespace ('Upload')->prefix("uploads")->middleware(['auth:admin'])->group(function () {
            Route::post("", "UploadController@index");
        });

    });
   
});
