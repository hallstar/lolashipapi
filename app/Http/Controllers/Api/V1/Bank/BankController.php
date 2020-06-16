<?php

namespace App\Http\Controllers\Api\V1\Bank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Facades\ApiResponse;
use Validator;
use App\Models\Bank;

class BankController extends Controller
{
    public function index(Request $request)
    {
        return ApiResponse::withSuccessData(Bank::with('branches')
            ->select(['id', 'name'])
            ->orderBy('name', 'ASC')
            ->get()
        );
    }
}
