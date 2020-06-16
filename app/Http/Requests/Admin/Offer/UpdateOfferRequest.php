<?php

namespace App\Http\Requests\Admin\Offer;

use Illuminate\Foundation\Http\FormRequest;
use App\Constants\FeeType;
use App\Constants\OfferType;
use App\Constants\OfferStatus;

class UpdateOfferRequest extends FormRequest
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
            'logo_upload_id'    => 'nullable|exists:uploads,id',
            'broker_id'         => 'required|exists:brokers,id',
            'currency_id'       => 'required|exists:currencies,id',

            'type'              => 'required|string|in:'.implode(',', OfferType::$methods),
            'status'            => 'required|string|in:'.implode(',', OfferStatus::$methods),
            'published'         => 'boolean',

            'title'             => 'required|string',
            'short_name'        => 'required|string',
            'prefix'            => 'required|string',
            'description'       => 'required|string',

            'opening_date'      => 'required|string',
            'closing_date'      => 'required|string',

            'unit_price'        => 'required|numeric',
            'available'         => 'required|numeric',
            'minimum'           => 'required|numeric',
            'maximum'           => 'required|numeric',
            'increment_size'    => 'required|numeric',

            'fees'              => 'nullable|array',
            'fees.*.name'       => 'required|string',
            'fees.*.type'       => 'required|string|in:'.implode(',', FeeType::$methods),
            'fees.*.amount'     => 'required|numeric',
        ];
    }
}
