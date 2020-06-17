<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    //

    public function index(Request $request)
    {
        $tenant = \App\Models\Tenant::find($request->tenant_id);

        return "Welcome to $tenant->name, Get your shipping address";
    }
}
