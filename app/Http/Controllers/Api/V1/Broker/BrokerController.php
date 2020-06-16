<?php

namespace App\Http\Controllers\Api\V1\Broker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Facades\ApiResponse;
use App\Models\Broker;
use Validator;

class BrokerController extends Controller
{
    public function index(Request $request)
    {
        return ApiResponse::withSuccessData(Broker::orderBy('code', 'ASC')->all());
    }
}
