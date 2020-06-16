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

        // Admin offer routes
        Route::namespace('Offer')->prefix('offers')->middleware(['auth:admin'])->group(function () {
            Route::get('/', 'OfferController@index')->middleware(['permission:offer_access']);
            Route::get('{id}', 'OfferController@show')->middleware(['permission:offer_show']);
            Route::post('/', 'OfferController@store')->middleware(['permission:offer_create']);

            Route::put('{offerId}/galleries/{uploadId}', 'GalleryController@store')->middleware(['permission:offer_edit']);
            Route::delete('{offerId}/galleries/{uploadId}', 'GalleryController@delete')->middleware(['permission:offer_edit']);

            Route::put('{id}', 'OfferController@update')->middleware(['permission:offer_edit']);
        });

        Route::namespace("ContactUs")->prefix("contact_us")->middleware(['auth:admin'])->group(function(){
            Route::get("", "ContactUsController@index");
            Route::get("{id}", "ContactUsController@show");
        });

        Route::namespace("Broker")->prefix("brokers")->middleware(['auth:admin'])->group(function(){
            Route::get("", "BrokerController@index")->middleware(['permission:broker_access']);
            Route::get("{id}", "BrokerController@show")->middleware(['permission:broker_show']);
            Route::post("", "BrokerController@store")->middleware(['permission:broker_create']);
            Route::put("{id}", "BrokerController@update")->middleware(['permission:broker_edit']);
            Route::delete("{id}", "BrokerController@delete")->middleware(['permission:broker_delete']);
        });

        Route::namespace("Currency")->prefix("currencies")->middleware(['auth:admin'])->group(function(){
            Route::get("", "CurrencyController@index")->middleware(['permission:currency_access']);
            Route::get("{id}", "CurrencyController@show")->middleware(['permission:currency_show']);
            Route::post("", "CurrencyController@store")->middleware(['permission:currency_create']);
            Route::put("{id}", "CurrencyController@update")->middleware(['permission:currency_edit']);
            Route::delete("{id}", "CurrencyController@delete")->middleware(['permission:currency_delete']);
        });

        Route::namespace("Bank")->prefix("banks")->middleware(['auth:admin'])->group(function(){
            Route::get("", "BankController@index")->middleware(['permission:bank_access']);
            Route::get("{id}", "BankController@show")->middleware(['permission:bank_show']);
            Route::post("", "BankController@store")->middleware(['permission:bank_create']);
            Route::put("{id}", "BankController@update")->middleware(['permission:bank_edit']);
            Route::delete("{id}", "BankController@delete")->middleware(['permission:bank_delete']);
        });

        // Upload route
        Route::namespace ('Upload')->prefix("uploads")->middleware(['auth:admin'])->group(function () {
            Route::post("", "UploadController@index");
        });

    });

    Route::namespace("Auth")->prefix("auth")->group(function(){
		// Authenticate
        Route::post("connect", "ConnectController@connect")->name('connect');
		Route::get("refresh-token", "ConnectController@refresh");
        Route::get("logout", "ConnectController@logout")->name('logout');

        // Test connect
        Route::post("test-connect", "ConnectController@testConnect")->name('test-connect');
    });

    // Offer routes
    Route::namespace ('Offer')->prefix("offers")->middleware(['auth:api'])->group(function () {
        Route::get("", "OfferController@index");
        Route::get("{id}", "OfferController@show");
    });

    // User routes
    Route::namespace ('User')->prefix("user")->middleware(['auth:api'])->group(function () {
        Route::get("me", "UserController@me");
        Route::post("profile", "ProfileController@profile");
        Route::post("business_profile", "ProfileController@businessProfile");
    });

    // Upload route
    Route::namespace ('Upload')->prefix("uploads")->group(function () {
        Route::post("", "UploadController@index");
    });

    // Application routes
    Route::namespace ('Application')->middleware(['auth:api'])->group(function () {

        Route::prefix("applications")->group(function () {
            Route::get("", "ApplicationController@index");
            Route::get("{id}", "ApplicationController@show");
            Route::delete("{id}", "ApplicationController@delete");
        });

        // Application wizard routes
        Route::namespace ('Wizard')->prefix("apply")->group(function () {
		    Route::post("{offerId}/step1/{applicationId?}", "Step1Controller@index");
		    Route::post("{offerId}/step2/{applicationId}", "Step2Controller@index");
		    Route::post("{offerId}/step3/{applicationId}", "Step3Controller@index");
		    Route::post("{offerId}/step4/{applicationId}", "Step4Controller@index");
        });

    });

    Route::namespace("Broker")->prefix("brokers")->middleware(['auth:api'])->group(function(){
		Route::get("", "BrokerController@index");
    });

    Route::namespace("ContactUs")->prefix("contact_us")->group(function(){
		Route::post("", "ContactUsController@index");
	});

	Route::namespace("Currency")->prefix("currencies")->middleware(['auth:api'])->group(function(){
		Route::get("", "CurrencyController@index");
	});

	Route::namespace("Bank")->prefix("banks")->middleware(['auth:api'])->group(function(){
		Route::get("", "BankController@index");
	});

});
