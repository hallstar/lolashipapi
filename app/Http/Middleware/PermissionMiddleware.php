<?php

namespace App\Http\Middleware;

use App\Facades\ApiResponse;
use App\Models\Role;
use Closure;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if (app('auth')->guest()) {
            return ApiResponse::withError('Unauthenticated.');
        }

        $roles  = \Auth::user()->roles;
        $permissions = is_array($permission)
            ? $permission
            : explode('|', $permission);

        foreach($roles as $r) {
            $role = Role::where('id', $r->id)->with('permissions')->first();
            foreach($role->permissions as $perm) {
                if(in_array($perm->title, $permissions)){
                    return $next($request);
                }
            }
        }

        return ApiResponse::withError('Unauthorized action.', null, 403);
    }
}
