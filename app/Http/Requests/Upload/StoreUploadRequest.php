<?php

namespace App\Http\Requests\Upload;

use Illuminate\Foundation\Http\FormRequest;

class StoreUploadRequest extends FormRequest
{
    public function rules()
    {
        return [
            'file' => 'required|file|mimes:jpeg,bmp,png,gif,svg,pdf,csv,xlsx,xls,docx,doc|max:10000',
            'media_type' => 'nullable|string',
            'upload_key' => 'nullable|string',
        ];
    }
}