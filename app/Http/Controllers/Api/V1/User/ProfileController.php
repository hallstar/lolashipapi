<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Facades\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateBusinessProfileRequest;
use App\Http\Requests\User\UpdateProfileRequest;
use App\Models\UserProfile;
use App\Models\UserBusinessProfile;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{

    public function profile(UpdateProfileRequest $request)
    {
        DB::beginTransaction();

        try {

            $user = auth()->user();

            $inputs = [
                'gender'            => $request->input('gender', null),
                'title'             => $request->input('title', null),
                'phone_number'      => $request->input('phone_number', null),
                'home_phone_number' => $request->input('home_phone_number', null),
                'work_phone_number' => $request->input('work_phone_number', null),
                'occupation'        => $request->input('occupation', null),
                'address_line1'     => $request->input('address_line1', null),
                'address_line2'     => $request->input('address_line2', null),
                'city'              => $request->input('city', null),
                'state'             => $request->input('state', null),
                'postal_code'       => $request->input('postal_code', null),
                'country'           => $request->input('country', null),
                'nationality'       => $request->input('nationality', null),
                'trn'               => $request->input('trn', null),
                'facsimile'         => $request->input('facsimile', null),
            ];

            if ($identificationLink = setUpload($request->input('identification_upload_id', null))) {
                $inputs['identification_link'] = $identificationLink;
            }

            UserProfile::updateOrCreate(
                ['user_id' => $user->id],
                $inputs
            );

            DB::commit();

            return ApiResponse::withSuccessData($user->load([
                'profile',
                'business_profile',
            ]));

        } catch (\Exception $e) {

            DB::rollback();
            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }

    public function businessProfile(UpdateBusinessProfileRequest $request)
    {
        DB::beginTransaction();

        try {

            $user = auth()->user();

            $inputs = [
                'corporation'       => $request->input('corporation', null),
                'line_of_business'  => $request->input('line_of_business', null),
                'phone_number'      => $request->input('phone_number', null),
                'address_line1'     => $request->input('address_line1', null),
                'address_line2'     => $request->input('address_line2', null),
                'city'              => $request->input('city', null),
                'state'             => $request->input('state', null),
                'postal_code'       => $request->input('postal_code', null),
                'country'           => $request->input('country', null),
                'trn'               => $request->input('trn', null),
            ];

            UserBusinessProfile::updateOrCreate(
                ['user_id' => $user->id],
                $inputs
            );

            DB::commit();

            return ApiResponse::withSuccessData($user->load([
                'profile',
                'business_profile',
            ]));

        } catch (\Exception $e) {

            DB::rollback();
            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }
}
