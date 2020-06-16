<?php

namespace App\Http\Requests\Application;

use Illuminate\Foundation\Http\FormRequest;
use App\Constants\PaymentType;
use App\Constants\RefundType;

class Step3Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'payment'                               =>'required|array',
            'payment.source_of_funds'               =>'string|required',
            'payment.amount'                        =>'numeric|required',
            'payment.type'                          =>'string|required|in:'.implode(',', PaymentType::$methods),

            'payment.payment_upload_id'             =>'integer|nullable',
            'payment.other_payment_upload_id'       =>'integer|nullable',

            'refund'                                =>'required|array',
            'refund.type'                           =>'string|required|in:'.implode(',', RefundType::$methods),
            'refund.broker_account_number'          =>'string|nullable|required_if:refund.type,'.RefundType::BROKER,

            'refund.bank_name'                      =>'string|nullable',
            'refund.branch_name'                    =>'string|nullable',
            'refund.branch_number'                  =>'string|nullable',
            'refund.bank_account_type'              =>'string|nullable',
            'refund.bank_account_number'            =>'string|nullable',
            'refund.bic'                            =>'string|nullable',
            'refund.bank_id'                        =>'nullable|exists:banks,id',
            'refund.branch_id'                      =>'nullable|exists:bank_branches,id',
        ];
    }
}
