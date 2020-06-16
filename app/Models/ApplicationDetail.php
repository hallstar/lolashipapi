<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationDetail extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'application_id',
        'first_name',
        'last_name',
        'email',
        'title',
        'gender',
        'trn',
        'identification_link',
        'address_line1',
        'address_line2',
        'city',
        'state',
        'postal_code',
        'country',
        'nationality',
        'occupation',
        'phone_number',
        'home_phone_number',
        'work_phone_number',
        'facsimile',
        'corporation',
        'line_of_business',
        'is_director',         
    ];
}