<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;

class CaddyController extends Controller
{
    //
    public function index(Request $request)
    {
        $domain = str_replace(".", "_", $request->get("domain"));

        $tenant = Tenant::where('domain', $domain)->where('is_active', true)->count();
        if($tenant>0)
        {
            return response()->json([], 200);
        }

        abort(404);
    }
}
