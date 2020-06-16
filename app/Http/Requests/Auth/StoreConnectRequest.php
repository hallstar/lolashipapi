<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class StoreConnectRequest extends FormRequest
{
    public function rules()
    {
        return [
            'token' => ['required', 'string'],
        ];
    }
}
