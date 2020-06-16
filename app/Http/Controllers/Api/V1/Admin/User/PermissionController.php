<?php

namespace App\Http\Controllers\Api\V1\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facades\ApiResponse;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\User\StorePermissionRequest;
use App\Http\Requests\Admin\User\UpdatePermissionRequest;

class PermissionController extends Controller
{
    //

    public function index(Permission $permission, Request $request)
    {
        // abort_unless(\Gate::allows('permission_access'), 403);

        $query = $permission->newQuery();

        if($request->input('all', false)) {
            $permissions = $query->orderBy('title', 'ASC')->get();
        } else {
            $permissions = $query->orderBy('created_at', 'DESC')->paginate(20);
        }

        return ApiResponse::withSuccessData($permissions);
    }

    public function show($id)
    {
        // abort_unless(\Gate::allows('role_show'), 403);

        try {

            $permission = Permission::findOrFail($id);

            return ApiResponse::withSuccessData($permission);

        } catch (\Exception $e) {

            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }

    public function store(StorePermissionRequest $request)
    {
        // abort_unless(\Gate::allows('permission_create'), 403);

        DB::beginTransaction();

        try {

            $permission = Permission::create([
                'title' => $request->input('title'),
            ]);

            DB::commit();

            return ApiResponse::withSuccessData($permission);

        } catch (\Exception $e) {

            DB::rollback();
            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }

    public function update($id, UpdatePermissionRequest $request)
    {
        // abort_unless(\Gate::allows('permission_edit'), 403);

        DB::beginTransaction();

        try {

            $permission = Permission::findOrFail($id);

            $permission->update([
                'title' => $request->input('title'),
            ]);

            DB::commit();

            return ApiResponse::withSuccessData($permission);

        } catch (\Exception $e) {

            DB::rollback();
            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }

    public function delete($id)
    {
        // abort_unless(\Gate::allows('permission_delete'), 403);

        DB::beginTransaction();

        try {

            $permission = Permission::findOrFail($id);

            $permission->delete();

            DB::commit();

            return ApiResponse::withSuccess("Deleted successfully.");

        } catch (\Exception $e) {

            DB::rollback();
            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }
}
