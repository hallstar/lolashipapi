<?php

namespace App\Http\Controllers\Api\V1\Currency;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Facades\ApiResponse;
use Validator;
use App\Models\Currency;

class CurrencyController extends Controller
{
    public function index(Request $request)
    {
        return ApiResponse::withSuccessData(Currency::orderBy('name', 'ASC')->all());
    }
}
