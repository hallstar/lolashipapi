<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBusinessProfile extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'application_id',
        'trn',
        'identification_link',
        'address_line1',
        'address_line2',
        'city',
        'state',
        'postal_code',
        'country',
        'phone_number',
        'corporation',
        'line_of_business',         
    ];
}
