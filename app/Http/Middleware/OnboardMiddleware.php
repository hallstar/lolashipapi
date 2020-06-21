<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Tenant;

class OnboardMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->get("token");

        $tenant  = Tenant::fromToken($token);

        if($tenant==null)
            abort(404);

        return $next($request);
    }
}
