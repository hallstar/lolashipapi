<?php

namespace App\Http\Requests\Application;

use Illuminate\Foundation\Http\FormRequest;

class Step2Request extends FormRequest
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
            'joint_accounts'                => 'array|nullable',
            'joint_accounts.*.first_name'   =>'string|required',
            'joint_accounts.*.last_name'    =>'string|required',
            'joint_accounts.*.trn'          =>'string|required',
            'joint_accounts.*.email'        =>'email|required',
            'joint_accounts.*.occupation'   =>'string|nullable',
            'joint_accounts.*.phone_number'        =>'string|nullable',
            'joint_accounts.*.minor'        =>'boolean|nullable',
            'joint_accounts.*.document_upload_id'       =>'integer|nullable',
            'joint_accounts.*.identification_upload_id'       =>'integer|nullable',
            'joint_accounts.*.other_document_upload_id' =>'integer|nullable',

            'directors'                 => 'array|nullable|required_if:type,Corporation',
            'directors.*.first_name'    =>'string|required|regex:/^[\pL\s\-]+$/u',
            'directors.*.last_name'     =>'string|required|regex:/^[\pL\s\-]+$/u',
            'directors.*.email'         =>'email|required',
        ];
    }
}
