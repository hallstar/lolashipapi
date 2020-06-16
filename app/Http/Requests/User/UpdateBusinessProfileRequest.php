<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBusinessProfileRequest extends FormRequest
{
    public function rules()
    {
        return [
            'corporation'       =>'string|required',
            'line_of_business'  =>'nullable|string',
            'phone_number'      =>'nullable|string|numeric',
            'address_line1'     =>'required|string',
            'address_line2'     =>'required|string',
            'city'              =>'nullable|string',
            'state'             =>'nullable|string',
            'postal_code'       =>'nullable|string',
            'country'           =>'required|string',
            'trn'               =>'required|string|numeric|min:9',
        ];
    }
}