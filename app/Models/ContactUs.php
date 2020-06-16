<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    //

    protected $table='contact_us';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'subject',
        'message',
        'read',
    ];

    public function getReadAttribute($value)
    {
        return $value ? true : false;
    }

    public function getCreatedAtAttribute($value)
    {
        return normalizeDate($value);
    }

    public function getUpdatedAtAttribute($value)
    {
        return normalizeDate($value);
    }
}
