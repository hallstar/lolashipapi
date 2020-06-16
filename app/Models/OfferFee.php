<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferFee extends Model
{
    //

    protected $fillable = [
        'name',
        'type',
        'amount',
    ];

    public function getAmountAttribute($value)
    {
        return normalize($value);
    }

    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = mutate($value);
    }
}
