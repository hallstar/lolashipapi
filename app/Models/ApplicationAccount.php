<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationAccount extends Model
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
        'minor',
        'confirmed',
        'first_name',
        'last_name',
        'email',
        'trn',
        'occupation',
        'phone_number',
        'identification_link',
        'document_link',
        'other_document_link',
        'signature',
        'signature_affixed_date',
    ];

    public function getConfirmedAttribute($value)
    {
        return $value ? true : false;
    }

    public function getMinorAttribute($value)
    {
        return $value ? true : false;
    }

    public function getSignatureAffixedDateAttribute($value)
    {
        return normalizeDate($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->select(['id', 'first_name', 'last_name', 'email']);
    }

    public function getSignatureAttribute($value)
    {
        return ($value==null ? null : generatePresignedUrl($value));
    }

    public function getIdentificationLinkAttribute($value)
    {
        return ($value==null ? null : generatePresignedUrl($value));
    }

    public function getDocumentLinkAttribute($value)
    {
        return ($value==null ? null : generatePresignedUrl($value));
    }

    public function getOtherDocumentLinkAttribute($value)
    {
        return ($value==null ? null : generatePresignedUrl($value));
    }

}
