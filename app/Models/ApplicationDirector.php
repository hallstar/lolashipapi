<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationDirector extends Model
{
    //

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'application_id',
        'user_id',
        'confirmed',
        'first_name',
        'last_name',
        'email',
        'trn',
        'occupation',
        'signature',
        'signature_affixed_date',
    ];

    public function getConfirmedAttribute($value)
    {
        return $value ? true : false;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->select(['id', 'first_name', 'last_name', 'email']);
    }

    public function getSignatureAttribute($value)
    {
        return ($value==null ? null : generatePresignedUrl($value));
    }
}
