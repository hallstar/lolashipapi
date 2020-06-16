<?php

namespace App\Http\Controllers\Api\V1\Application\Wizard;

use App\Facades\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Application\Step4Request;
use App\Models\Application;
use Illuminate\Support\Facades\DB;

class Step4Controller extends Controller
{
    public function index($offerId, $applicationId, Step4Request $request)
    {
        DB::beginTransaction();

        try {

            $offer = Offer::where('id', $offerId)->where('status', '!=', OfferStatus::CLOSED)->firstOrFail();
            $user = auth()->user();

            $application = Application::where('id', $applicationId)
                ->where('offer_id', $offer->id)
                ->where('user_id', $user->id)
                ->whereIn('status', [ApplicationStatus::DRAFT, ApplicationStatus::REJECTED])
                ->firstOrFail();

            $inputs = [
                'step'          => ApplicationStep::FOUR,
                'status'        => ApplicationStatus::DRAFT,
                'method'        => $request->input('method')
            ];
            
            if($signatureLink = setUpload($request->input('signature_upload_id', null))) 
            {
                $inputs['signature'] = $signatureLink;
                $inputs['signature_affixed_date'] = \Carbon\Carbon::now()->format("Y-m-d");
                $inputs['form_link'] = null;

                foreach($application->joint_accounts as $account)
                {
                    // Dont send email to minor
                    if(!$account->minor) 
                    {
                        // Mail::to($jointAccount->email)->queue(new JointAccountRequest(User::find($jointAccount->user_id), $application, $jointAccount));  
                    }     
                }

                foreach($application->directors as $director)
                {
                    // Mail::to($director->email)->queue(new DirectorRequest(User::find($director->user_id), $application, $director));
                }
            }
            
            if($formLink = setUpload($request->input('form_upload_id', null))) 
            {
                $inputs['form_link'] = $formLink;
            }
            
            $application->update($inputs);
            
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
