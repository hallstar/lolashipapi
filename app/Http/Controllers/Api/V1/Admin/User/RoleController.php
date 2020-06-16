<?php

namespace App\Http\Controllers\Api\V1\Admin\User;

use App\Http\Requests\Admin\User\StoreRoleRequest;
use App\Http\Requests\Admin\User\UpdateRoleRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Facades\ApiResponse;
use App\Models\Role;

class RoleController extends Controller
{
    //
    public function index(Role $role, Request $request)
    {
        // abort_unless(\Gate::allows('role_access'), 403);

        $query = $role->newQuery();
        $query->with(['permissions']);

        if($request->input('all', false)) {
            $roles = $query->orderBy('title', 'ASC')->get();
        } else {
            $roles = $query->orderBy('created_at', 'DESC')->paginate(20);
        }

        return ApiResponse::withSuccessData($roles);
    }

    public function store(StoreRoleRequest $request)
    {
        // abort_unless(\Gate::allows('role_create'), 403);

        DB::beginTransaction();

        try {

            $role = Role::create([
                'title' => $request->input('title'),
            ]);

            $role->permissions()->sync($request->input('permissions', []));

            DB::commit();

            return ApiResponse::withSuccessData($role);

        } catch (\Exception $e) {

            DB::rollback();
            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }

    public function update($id, UpdateRoleRequest $request)
    {
        // abort_unless(\Gate::allows('role_edit'), 403);

        DB::beginTransaction();

        try {

            $role = Role::findOrFail($id);

            $role->update([
                'title' => $request->input('title'),
            ]);

            $role->permissions()->sync($request->input('permissions', []));

            DB::commit();

            return ApiResponse::withSuccessData($role);

        } catch (\Exception $e) {

            DB::rollback();
            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }

    public function show($id)
    {
        // abort_unless(\Gate::allows('role_show'), 403);

        try {

            $role = Role::findOrFail($id);

            $role->load('permissions');

            return ApiResponse::withSuccessData($role);

        } catch (\Exception $e) {

            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }

    public function delete($id)
    {
        // abort_unless(\Gate::allows('role_delete'), 403);

        DB::beginTransaction();

        try {

            $role = Role::findOrFail($id);

            $role->delete();

            DB::commit();

            return ApiResponse::withSuccess("Deleted successfully.");

        } catch (\Exception $e) {

            DB::rollback();
            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }
}
