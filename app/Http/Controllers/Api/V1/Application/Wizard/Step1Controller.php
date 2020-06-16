<?php

namespace App\Http\Controllers\Api\V1\Application\Wizard;

use App\Facades\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Application\Step1Request;
use App\Constants\ApplicationEntryType;
use App\Constants\ApplicationType;
use App\Constants\ApplicationStatus;
use App\Constants\ApplicationStep;
use App\Constants\OfferStatus;
use App\Models\Application;
use App\Models\ApplicationDetail;
use App\Models\Offer;
use Illuminate\Support\Facades\DB;

class Step1Controller extends Controller
{
    public function index($offerId, $applicationId=null, Step1Request $request)
    {
        DB::beginTransaction();

        try {

            $offer = Offer::where('id', $offerId)->where('status', '!=', OfferStatus::CLOSED)->firstOrFail();
            $user = auth()->user();

            if(empty($applicationId))
            {
                $application = Application::create([
                    'offer_id'          => $offer->id,
                    'user_id'           => $user->id,
                    'broker_id'         => $request->input('broker_id'),
                    'entry_type'        => ApplicationEntryType::ONLINE,
                    'reference_number'  => generateReferenceNumber($offerId, $offer->prefix)
                ]);
            } 
            else 
            {
                $application = Application::where('id', $applicationId)
                    ->where('offer_id', $offer->id)
                    ->where('user_id', $user->id)
                    ->whereIn('status', [ApplicationStatus::DRAFT, ApplicationStatus::REJECTED])
                    ->firstOrFail();
            }

            $user->brokers()->firstOrCreate([
                'broker_id'     => $request->input('broker_id'),
            ]);

            // Calculate amount with fees
            $amount = $request->input('units') * $offer->unit_price;
            $amount = $amount + $offer->calculateFees($amount);

            $application->update([
                'broker_id'     => $request->input('broker_id'),
                'type'          => $request->input('type'),
                'units'         => $request->input('units'),
                'amount'        => $amount,
                'step'          => ApplicationStep::ONE,
                'status'        => ApplicationStatus::DRAFT,
                'form_link'     => null,
            ]);

            $inputs = [
                'address_line1'             => $request->input('address_line1', null),
                'address_line2'             => $request->input('address_line2', null),
                'phone_number'              => $request->input('phone_number', null),
                'city'                      => $request->input('city', null),
                'state'                     => $request->input('state', null),
                'postal_code'               => $request->input('postal_code', null),
                'country'                   => $request->input('country', null),
                'trn'                       => $request->input('trn'),
            ];

            if($request->input('type') == ApplicationType::INDIVIDUAL)
            {
                $inputs['occupation']           = $request->input('occupation', null);
                $inputs['title']                = $request->input('title', null);
                $inputs['gender']               = $request->input('gender', null);
                $inputs['nationality']          = $request->input('nationality', null);
                $inputs['home_phone_number']    = $request->input('home_phone_number', null);
                $inputs['work_phone_number']    = $request->input('work_phone_number', null);
                $inputs['facsimile']            = $request->input('facsimile', null);

                if($identificationLink = setUpload($request->input('identification_upload_id', null))) 
                {
                    $inputs['identification_link'] = $identificationLink;
                }
                
                if(empty($user->profile))
                {
                    $user->profile()->create($inputs);
                }
            }
            else
            {   
                $inputs['corporation']          = $request->input('corporation', null);
                $inputs['line_of_business']     = $request->input('line_of_business', null);

                if(empty($user->business_profile))
                {
                    $user->business_profile()->create($inputs);
                }
            }

            $inputs['first_name']           = $request->input('first_name', null);
            $inputs['last_name']            = $request->input('last_name', null);

            ApplicationDetail::updateOrCreate(['application_id' => $application->id], $inputs);

            DB::commit();

            return ApiResponse::withSuccessData($application->load([
                'broker',
                'detail',
                'directors',
                'joint_accounts',
                'payment',
                'refund',
                'user',
            ]));

        } catch (\Exception $e) {

            DB::rollback();
            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }    
}
