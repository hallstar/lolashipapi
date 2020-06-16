<?php

namespace App\Http\Controllers\Api\V1\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Facades\ApiResponse;
use App\Http\Requests\Admin\Auth\LoginRequest;
use App\Http\Requests\Admin\Auth\ForgetRequest;
use App\Http\Requests\Admin\Auth\PasswordResetRequest;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\AdminUser;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\DB;
use App\Mail\SendResetPasswordLink;
use Hash;
use Mail;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {

        try
        {

            if (!$token = auth('admin')->attempt($request->only(['email', 'password']))) {
                throw new \Exception('Invalid credentials ');
            }

            return ApiResponse::withSuccessData([
                'token'      => $token,
                'token_type' => 'bearer',
                'expires'    => auth('admin')->factory()->getTTL() * 60,
            ]);

        } catch (\Exception $e) {

            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());
        }
    }
    
    public function logout()
    {
        try
        {

            $token = JWTAuth::getToken();
            JWTAuth::invalidate($token);

            return ApiResponse::withSuccess('Successfully logged out');

        } catch (\Exception $e) {

            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());
        }
    }

    public function refresh()
    {
        try
        {

            $token = JWTAuth::getToken();
            $new_token = JWTAuth::refresh($token);

            return ApiResponse::withSuccessData([
                'token'      => $new_token,
                'token_type' => 'bearer',
                'expires'    => auth('admin')->factory()->getTTL() * 60,
            ]);

        } catch (\Exception $e) {

            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());
        }
    }

    public function forget(ForgetRequest $request)
    {
        DB::beginTransaction();

        try {

            $adminUser = AdminUser::where('email', $request->input('email'))->first();
            
            if($adminUser)
            {
                PasswordReset::where('email', $adminUser->email)->delete();

                $reset = new PasswordReset;
                $reset->email = $adminUser->email;
                $reset->created_at = \Carbon\Carbon::now();
                $reset->token = \Illuminate\Support\Str::random(64);
                $reset->save();
            }

            // Send mail with reset link
            Mail::to($reset->email)->queue(new SendResetPasswordLink($adminUser, $reset));

            DB::commit();

            return ApiResponse::withSuccess("Your password request reset request was submitted");

        } catch (\Exception $e) {

            DB::rollback();
            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }

    public function checkToken($token)
    {
        try {

            $result = PasswordReset::where('token', $token)->firstOrFail();
            return ApiResponse::withSuccessData($result);

        } catch (\Exception $e) {

            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }

    public function passwordReset(PasswordResetRequest $request)
    {
        DB::beginTransaction();

        try {

            $adminUser = AdminUser::where('email', $request->input('email'))->firstOrFail();
            
            $adminUser->update([
                'password' => Hash::make($request->input('password'))
            ]);

            PasswordReset::where('email', $adminUser->email)->delete();
            
            DB::commit();

            return ApiResponse::withSuccess("Your password has been updated.");

        } catch (\Exception $e) {

            DB::rollback();
            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }
}
