<?php

namespace App\Http\Requests\Application;

use Illuminate\Foundation\Http\FormRequest;
use App\Constants\ApplicationType;

class Step1Request extends FormRequest
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
            // Application general info
            'broker_id'                 =>'required|exists:brokers,id',
            'units'                     =>'required|numeric',
            'type'                      =>'required|string|in:'.implode(',', ApplicationType::$methods),
            'trn'                       =>'required|string|min:9',

            // Address related properties
            'address_line1'             =>'required|string',
            'address_line2'             =>'required|string',
            'phone_number'              =>'required|string',
            'city'                      =>'nullable|string',
            'state'                     =>'nullable|string',
            'postal_code'               =>'nullable|string',
            'country'                   =>'required|string',

            // Corporation related details 
            'corporation'               =>'string|required_if:type,'.ApplicationType::CORPORATION,
            'line_of_business'          =>'nullable|string',
            'is_director'               =>'nullable|boolean',  

            // Individual related details 
            'first_name'                =>'string|required_if:type,'.ApplicationType::INDIVIDUAL,
            'last_name'                 =>'string|required_if:type,'.ApplicationType::INDIVIDUAL,
            'occupation'                =>'string|required_if:type,'.ApplicationType::INDIVIDUAL,
            'title'                     =>'nullable|string',
            'gender'                    =>'nullable|string',
            'nationality'               =>'nullable|string',
            'home_phone_number'         =>'nullable|string',
            'work_phone_number'         =>'nullable|string',
            'facsimile'                 =>'nullable|string',
        ];
    }
}
