<?php

namespace App\Http\Controllers\Api\V1\Admin\User;

use App\Facades\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use App\Models\AdminUser;

class UserProfileController extends Controller
{

    public function me()
    {
        return ApiResponse::withSuccessData(auth()->user()->load(['roles']));
    }

}
