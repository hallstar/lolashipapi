<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function rules()
    {
        return [
            'gender'            =>'nullable|string',
            'title'             =>'nullable|string',
            'phone_number'          =>'nullable|string|numeric',
            'home_phone_number'     =>'nullable|string|numeric',
            'work_phone_number'     =>'nullable|string|numeric',
            'occupation'        =>'nullable|string',
            'address_line1'     =>'nullable|string',
            'address_line2'     =>'nullable|string',
            'city'              =>'nullable|string',
            'state'             =>'nullable|string',
            'postal_code'       =>'nullable|string',
            'country'           =>'nullable|string',
            'nationality'       =>'nullable|string',
            'trn'               =>'nullable|string|numeric|min:9',
            'identification_upload_id' => 'nullable|exists:uploads,id'
        ];
    }
}