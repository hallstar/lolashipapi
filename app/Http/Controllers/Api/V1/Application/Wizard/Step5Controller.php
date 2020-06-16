<?php

namespace App\Http\Controllers\Api\V1\Application\Wizard;

use App\Facades\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Application\Step5Request;
use App\Models\Application;
use Illuminate\Support\Facades\DB;

class Step5Controller extends Controller
{
    public function index($offerId, $applicationId, Step5Request $request)
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
                'status'        => ApplicationStatus::PENDING,
                'submitted_on'  => \Carbon\Carbon::now()->format("Y-m-d H:i:s")
            ];

            if(empty($application->form_link))
            {
                if($application->type===ApplicationType::INDIVIDUAL)
                {
                    // $pdf = PDF::loadView('pdf.individual', compact('application'))->setPaper('letter', 'potrait');
                }
                else
                {
                    // $pdf = PDF::loadView('pdf.corporation', compact('application'))->setPaper('letter', 'potrait');
                }

                // $filePath = 'uploads/'.date('Y').'/'.date('m').'/'.date('d').'/'.time().'-'.md5(generateRandomString(10)).'.pdf';

                // \Storage::disk('local')->put($filePath, $pdf->output());
                
                // $application->form_link = $filePath;
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
