<?php

namespace App\Http\Requests\Application;

use Illuminate\Foundation\Http\FormRequest;

class Step4Request extends FormRequest
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
            'method' =>'string|required|in:'.implode(',', ApplicationMethod::$methods),
            'signature_upload_id' =>'integer|nullable',
            'form_upload_id' =>'integer|nullable',
        ];
    }
}
