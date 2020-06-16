<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferGallery extends Model
{
    //

    protected $hidden = [
        'offer_id',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'offer_id',
        'url',
    ];

    public function getUrlAttribute($value)
    {
        return ($value == null ? null : generatePresignedUrl($value));
    }
}
