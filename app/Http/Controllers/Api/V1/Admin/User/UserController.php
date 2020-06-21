<?php

namespace App\Http\Controllers\Api\V1\Admin\User;

use App\Facades\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\SendNewAdminAccount;
use Mail;

class UserController extends Controller
{

    public function index(AdminUser $user, Request $request)
    {
        $query = $user->newQuery();

        if($request->input('all', false)) {
            $users = $query->orderBy('firstname', 'ASC')->get();
        } else {
            $users = $query->with(['roles' => function($item) {
                return $item->without('permissions');
            } ])->orderBy('created_at', 'DESC')->paginate(20);
        }

        return ApiResponse::withSuccessData($users);
    }

    public function show($id)
    {
        try {

            $user = AdminUser::findOrFail($id);

            return ApiResponse::withSuccessData($user->load('roles'));

        } catch (\Exception $e) {

            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }

    public function store(StoreUserRequest $request)
    {
        DB::beginTransaction();

        try {

            $adminUser = AdminUser::create([
                'email' => $request->input('email'),
                'firstname' => $request->input('first_name'),
                'lastname' => $request->input('last_name'),
                'password' => Hash::make($request->input('password'))
            ]);

            $adminUser->roles()->sync($request->input('roles', []));

            // Send email to new user with credentials
            Mail::to($adminUser->email)->queue(new SendNewAdminAccount($adminUser, $request->input('password')));

            DB::commit();

            return ApiResponse::withSuccessData($adminUser);

        } catch (\Exception $e) {

            DB::rollback();
            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }

    public function update($id, UpdateUserRequest $request)
    {
        DB::beginTransaction();

        try {

            $adminUser = AdminUser::findOrFail($id);

            $adminUser->update([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
            ]);

            $adminUser->roles()->sync($request->input('roles', []));

            DB::commit();

            return ApiResponse::withSuccessData($adminUser);

        } catch (\Exception $e) {

            DB::rollback();
            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {

            $user = AdminUser::findOrFail($id);
            $user->roles()->detach();
            $user->delete();

            DB::commit();

            return ApiResponse::withSuccess("Deleted successfully.");

        } catch (\Exception $e) {

            DB::rollback();
            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }
}
