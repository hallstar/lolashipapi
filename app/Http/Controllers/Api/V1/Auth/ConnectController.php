<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Facades\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreConnectRequest;
use App\Models\User;
use App\Services\OrbaOne\OrbaOne;
use Illuminate\Support\Facades\DB;
use JWTAuth;
use Validator;
use Illuminate\Http\Request;

class ConnectController extends Controller
{
    //

    public function connect(StoreConnectRequest $request)
    {

        DB::beginTransaction();

        try
        {

            $orbaOne = new OrbaOne();
            $result = $orbaOne->verify($request->token);

            if (!$result->isSuccessful) {
                throw new \Exception($result->data->message);
            }

            $user = User::firstOrCreate(
                ['email' => $result->data->user->email],
                [
                    'first_name' => $result->data->user->firstName,
                    'last_name' => $result->data->user->lastName,
                    'email_verified_at' => now(),
                    'orba_user_id' => $result->data->user->id,
                ]
            );
            
            if (!$token = auth('api')->fromUser($user)) {
                throw new \Exception("Something when wrong. Please try again ");
            }

            DB::commit();

            return ApiResponse::withSuccessData([
                'token' => $token,
                'token_type' => 'bearer',
                'expires' => auth('api')->factory()->getTTL() * 60,
            ]);

        } catch (\Exception $e) {

            DB::rollback();
            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }

    }

    public function refresh()
    {
        try
        {
            $oldToken = JWTAuth::getToken();
            $newToken = JWTAuth::refresh($oldToken);

            return ApiResponse::withSuccessData([
                'token' => $newToken,
                'token_type' => 'bearer',
                'expires' => auth('api')->factory()->getTTL() * 60
            ]);

        } catch (\Exception $e) {

            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }

    public function logout()
    {
        try
        {
            auth('api')->logout();

            return ApiResponse::withSuccess("Successfully logged out");

        } catch (\Exception $e) {

            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }

    public function testConnect(Request $request)
    {

        $validator = Validator::make($request->all(), [
    		'email' =>'required|email',
    		'first_name' =>'required|string',
    		'last_name' =>'required|string',
        ]);

    	if($validator->fails())
        {
            return ApiResponse::withError($validator->errors()->toArray());
        }
            
        DB::beginTransaction();

        try
        {

            $user = User::firstOrCreate(
                ['email' => $request->input('email')],
                [
                    'first_name' => $request->input('first_name'),
                    'last_name' => $request->input('last_name'),
                    'email_verified_at' => now(),
                ]
            );
            
            if (!$token = auth('api')->fromUser($user)) {
                throw new \Exception("Something when wrong. Please try again ");
            }

            DB::commit();

            return ApiResponse::withSuccessData([
                'token' => $token,
                'token_type' => 'bearer',
                'expires' => auth('api')->factory()->getTTL() * 60,
            ]);

        } catch (\Exception $e) {

            DB::rollback();
            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }

    }
}
