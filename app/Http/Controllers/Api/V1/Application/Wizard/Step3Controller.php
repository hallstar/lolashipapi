<?php

namespace App\Http\Controllers\Api\V1\Application\Wizard;

use App\Facades\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Application\Step3Request;
use App\Constants\ApplicationStatus;
use App\Constants\ApplicationStep;
use App\Constants\ApplicationType;
use App\Constants\OfferStatus;
use App\Models\Application;
use App\Models\ApplicationPayment;
use App\Models\ApplicationRefund;
use App\Models\ApplicationDetail;
use App\Models\Offer;
use Illuminate\Support\Facades\DB;

class Step3Controller extends Controller
{
    public function index($offerId, $applicationId, Step3Request $request)
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
                'type'                      => $request->input('payment.type'),
                'amount'                    => $request->input('payment.amount'),
                'institution'               => $request->input('payment.institution', null),
                'transfer_type'             => $request->input('payment.transfer_type', null),
                'confirmation_reference'    => $request->input('payment.confirmation_reference', null),
                'sender_name'               => $request->input('payment.sender_name', null),
                'sender_account_number'     => $request->input('payment.sender_account_number', null),
                'transit_code'              => $request->input('payment.transit_code', null),
                'cheque_number'             => $request->input('payment.cheque_number', null),
                'payment_date'              => $request->input('payment.payment_date', null),
                'broker_account_number'     => $request->input('payment.broker_account_number', null),
                'source_of_funds'           => $request->input('payment.source_of_funds', null),
            ];
            
            if($paymentLink = setUpload($request->input('payment.payment_upload_id', null))) 
            {
                $inputs['link'] = $paymentLink;
            }

            if($otherPaymentLink = setUpload($request->input('payment.other_payment_upload_id', null))) 
            {
                $inputs['other_link'] = $otherPaymentLink;
            }
    
            ApplicationPayment::updateOrCreate([
                'application_id' => $applicationId
            ], $inputs);
            
            $refund = ApplicationRefund::updateOrCreate(
                [   'application_id'        => $application->id],
                [
                    'bic'                   => $request->input('refund.bic', null),
                    'bank_id'               => $request->input('refund.bank_id', null),
                    'branch_id'             => $request->input('refund.branch_id', null),
                    'bank_name'             => $request->input('refund.bank_name', null),
                    'type'                  => $request->input('refund.type', null),
                    'branch_name'           => $request->input('refund.branch_name', null), 
                    'branch_number'         => $request->input('refund.branch_number', null),
                    'bank_account_type'     => $request->input('refund.bank_account_type', null),
                    'bank_account_number'   => $request->input('refund.bank_account_number', null),
                    'broker_account_number' => $request->input('refund.broker_account_number', null),
                ]
            );

            $application->update([
                'step'          => ApplicationStep::THREE,
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
