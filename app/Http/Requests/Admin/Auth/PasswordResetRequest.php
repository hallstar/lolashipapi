<?php

namespace App\Http\Requests\Admin\Auth;

use Illuminate\Foundation\Http\FormRequest;

class PasswordResetRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email'  => 'required|email',
            'token'  => 'required|string',
            'password' => 'required|string|min:8'
        ];
    }
}
