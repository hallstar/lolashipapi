<?php

namespace App\Http\Controllers\Api\V1\Application\Wizard;

use App\Facades\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Application\Step2Request;
use App\Constants\ApplicationStatus;
use App\Constants\ApplicationStep;
use App\Constants\ApplicationType;
use App\Constants\OfferStatus;
use App\Models\Application;
use App\Models\ApplicationAccount;
use App\Models\ApplicationDirector;
use App\Models\ApplicationDetail;
use App\Models\Offer;
use Illuminate\Support\Facades\DB;

class Step2Controller extends Controller
{
    public function index($offerId, $applicationId, Step2Request $request)
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

            if(!empty($request->input('joint_accounts')) && $application->type == ApplicationType::INDIVIDUAL)
            {
                $accountIds = [];

                foreach($request->get('joint_accounts') as $data)
                {

                    $inputs = [
                        'first_name'   => $data['first_name'],
                        'last_name'    => $data['last_name'],
                        'email'        => $data['email'],
                        'occupation'   => empty($data['occupation']) ? null : $data['occupation'],
                        'phone_number' => empty($data['phone_number']) ? null : $data['phone_number'],
                        'minor'        => empty($data['minor']) ? false : $data['minor'],
                    ];

                    if($identificationLink = setUpload(empty($data['identification_upload_id']) ? null : $data['identification_upload_id'])) 
                    {
                        $inputs['identification_link'] = $identificationLink;
                    }

                    if($documentLink = setUpload(empty($data['document_upload_id']) ? null : $data['document_upload_id'])) 
                    {
                        $inputs['document_link'] = $documentLink;
                    }

                    if($otherDocumentLink = setUpload(empty($data['other_document_upload_id']) ? null : $data['other_document_upload_id'])) 
                    {
                        $inputs['other_document_link'] = $otherDocumentLink;
                    }

                    $account = ApplicationAccount::updateOrCreate([
                        'application_id' => $application->id,
                        'trn' => $data['trn']
                    ], $inputs);

                    $accountIds[] = $account->id;
                }

                ApplicationAccount::where('application_id', $application->id)->whereNotIn('id', $accountIds)->delete();
            }

            if(!empty($request->input('directors')) && $application->type == ApplicationType::CORPORTION)
            {
                $directorIds = [];

                foreach($request->input('directors') as $data)
                {
                    $director = ApplicationAccount::updateOrCreate([
                        'application_id' => $application->id,
                        'trn' => $data['trn']
                    ], [
                        'first_name'   => $data['first_name'],
                        'last_name'    => $data['last_name'],
                        'email'        => $data['email'],
                        'occupation'   => empty($data['occupation']) ? null : $data['occupation'],
                    ]);

                    $directorIds[] = $director->id;
                }

                ApplicationDirector::where('application_id', $application->id)->whereNotIn('id', $directorIds)->delete();
            }

            $application->update([
                'step'          => ApplicationStep::TWO,
                'status'        => ApplicationStatus::DRAFT,
                'form_link'     => null,
            ]);
            
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
