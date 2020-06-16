<?php

namespace App\Http\Controllers\Api\V1\Admin\ContactUs;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Facades\ApiResponse;
use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    public function index(ContactUs $contactUs, Request $request)
    {
        $query = $contactUs->newQuery();
        return ApiResponse::withSuccessData($query->orderBy('created_at', 'DESC')->paginate(20));
    }

    public function show($id)
    {
        try {

            $contactUs = ContactUs::findOrFail($id);

            $contactUs->update(['read' => true]);

            return ApiResponse::withSuccessData($contactUs);

        } catch (\Exception $e) {

            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }

}
