<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    //

    protected $fillable = [
        'broker_id',
        'currency_id',
        'prefix',
        'title',
        'short_name',
        'description',
        'type',
        'market_type',
        'status',
        'opening_date',
        'closing_date',
        'unit_price',
        'minimum',
        'maximum',
        'available',
        'increment_size',
        'published',
        'logo',
        'thumbnail_logo',
        'link',
        'research_link',
    ];

    // public function getLogoAttribute($value)
    // {
    //     return ($value == null ? null : generatePresignedUrl($value));
    // }

    public function getUnitPriceAttribute($value)
    {
        return normalize($value);
    }

    public function setUnitPriceAttribute($value)
    {
        $this->attributes['unit_price'] = mutate($value);
    }

    public function getOpeningDateAttribute($value)
    {
        return normalizeDate($value);
    }

    public function setOpeningDateAttribute($value)
    {
        $this->attributes['opening_date'] = \Carbon\Carbon::parse($value)->format("Y-m-d H:i:s");
    }

    public function getClosingDateAttribute($value)
    {
        return normalizeDate($value);
    }

    public function setClosingDateAttribute($value)
    {
        $this->attributes['closing_date'] = \Carbon\Carbon::parse($value)->format("Y-m-d H:i:s");
    }

    public function getCreatedAtAttribute($value)
    {
        return normalizeDate($value);
    }

    public function getUpdatedAtAttribute($value)
    {
        return normalizeDate($value);
    }

    public function broker()
    {
        return $this->belongsTo(Broker::class, 'broker_id')->select(['id', 'name', 'code']);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    public function fees()
    {
        return $this->hasMany(OfferFee::class);
    }

    public function galleries()
    {
        return $this->hasMany(OfferGallery::class);
    }

    public function calculateFees($amount)
    {
        $feeTotal = 0;

        foreach($this->fees as $fee)
        {
            if($fee->type=='Flat')
            {
                $feeTotal += $fee->amount;
            }

            if($fee->type=='Percentage')
            {
                $feePercentageAmount = $amount * ($fee->amount/100);
                $feeTotal += $feePercentageAmount;
            }
        }

        return $feeTotal;
    }
}
