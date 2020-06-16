<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationPayment extends Model
{
    //

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'application_id',
        'amount',
        'type',
        'institution',
        'confirmation_reference',
        'sender_name',
        'sender_account_number',
        'transit_code',
        'cheque_number',
        'broker_account_number',
        'source_of_funds',
        'payment_date',
        'link',
        'other_link',
    ];

    public function getAmountAttribute($value)
    {
        return normalize($value);
    }

    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = mutate($value);
    }

    public function getLinkAttribute($value)
    {
        return ($value==null ? null : generatePresignedUrl($value));
    }

    public function getOtherLinkAttribute($value)
    {
        return ($value==null ? null : generatePresignedUrl($value));
    }
}
