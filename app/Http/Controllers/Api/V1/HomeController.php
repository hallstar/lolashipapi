<?php

namespace App\Http\Controllers\Api\V1;

use App\Facades\ApiResponse;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1",
     *     summary="",
     *     description="",
     *     tags={"Info"},
     *     @OA\Response(response=200,description="successful operation",@OA\JsonContent()),
     *     @OA\Response(response=400,description="validation/server error",),
     *     @OA\Response(response=401,description="validation/server error",)
     * )
     */
    public function index()
    {
        return ApiResponse::withSuccess('KP Reit  Version 1.0');
    }
}
