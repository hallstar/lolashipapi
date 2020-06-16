<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Facades\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function me()
    {
        return ApiResponse::withSuccessData(auth()->user()->load([
            'business_profile',
            'profile'
        ]));
    }
}
