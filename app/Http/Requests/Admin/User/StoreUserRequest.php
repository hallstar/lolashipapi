<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name'    => [
                'required',
                'string'
            ],
            'last_name'    => [
                'required',
                'string'
            ],
            'email'   => [
                'required',
                'unique:App\Models\AdminUser,email'
            ],
            'password'    => [
                'required',
                'string'
            ],
            'roles.*' => [
                'integer',
            ],
            'roles'   => [
                'nullable',
                'array',
            ],
        ];
    }
}
