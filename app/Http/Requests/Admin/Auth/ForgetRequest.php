<?php

namespace App\Http\Requests\Admin\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ForgetRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email'    => ['required', 'string', 'email', 'max:255']
        ];
    }
}
