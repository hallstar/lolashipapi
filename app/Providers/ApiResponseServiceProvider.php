<?php

namespace App\Providers;

use App\Http\ApiResponseMeta;
use Illuminate\Support\ServiceProvider;

class ApiResponseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('apiresponse', function () {
            return new ApiResponseMeta;
        });
    }
}
