<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'last_name', 
        'first_name', 
        'orba_user_id', 
        'email', 
        'password',
        'gender',
        'title',
        'phone_number',
        'home_phone_number',
        'work_phone_number',
        'identification_link',
        'occupation',
        'address_line1',
        'address_line2',
        'city',
        'state',
        'postal_code',
        'country',
        'nationality',
        'trn'             
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }


    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getIdentificationLinkAttribute($value)
    {
        return ($value==null ? null : generatePresignedUrl($value));
    }

    public function brokers()
    {
        return $this->hasMany(UserBroker::class)->with(['broker']);
    }

    public function business_profile()
    {
        return $this->hasOne(UserBusinessProfile::class);
    }

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }
}
