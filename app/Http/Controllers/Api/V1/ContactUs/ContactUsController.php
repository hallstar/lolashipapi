<?php

namespace App\Http\Controllers\Api\V1\ContactUs;

use App\Http\Requests\ContactUs\StoreContactUsRequest;
use App\Http\Controllers\Controller;
use App\Mail\SendContactUsMessage;
use Illuminate\Support\Facades\DB;
use App\Facades\ApiResponse;
use App\Models\ContactUs;
use Mail;

class ContactUsController extends Controller
{
    public function index(StoreContactUsRequest $request)
    {
        DB::beginTransaction();

        try 
        {
            $contactUs = ContactUs::create([
                'full_name'     => $request->input('full_name'),
                'email'         => $request->input('email'),
                'phone'         => $request->input('phone'),
                'subject'       => $request->input('subject'),
                'message'       => $request->input('message'),
            ]);

            Mail::to('romario@orba.io')->queue(new SendContactUsMessage($contactUs));

            DB::commit();

            return ApiResponse::withSuccess("Ok");

        } catch (\Exception $e) {

            DB::rollback();
            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }

}
