<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reference_number',
        'offer_id',
        'user_id',
        'broker_id',
        'units',
        'approved_units',
        'amount',
        'approved_amount',
        'type',
        'entry_type',
        'step',
        'status',
        'form_link',
        'signature',
        'signature_affixed_date',
        'submitted_on',
        'approved_on',
        'approved_by',
        'reason',
    ];

    public function getAmountAttribute($value)
    {
        return normalize($value);
    }

    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = mutate($value);
    }

    public function getSignatureAttribute($value)
    {
        return ($value == null ? null : generatePresignedUrl($value));
    }

    public function getCreatedAtAttribute($value)
    {
        return normalizeDate($value);
    }

    public function getUpdatedAtAttribute($value)
    {
        return normalizeDate($value);
    }

    public function getSubmittedOnAttribute($value)
    {
        return normalizeDate($value);
    }

    public function getApprovedOnAttribute($value)
    {
        return normalizeDate($value);
    }

    public function getSignatureAffixedDateAttribute($value)
    {
        return normalizeDate($value);
    }

    public function offer()
    {
        return $this->belongsTo(Offer::class)->with(['currency']);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->select(['id', 'first_name', 'last_name', 'email']);
    }

    public function broker()
    {
        return $this->belongsTo(Broker::class, 'broker_id')->select(['id', 'name', 'code']);
    }

    public function detail()
    {
        return $this->hasOne(ApplicationDetail::class);
    }

    public function joint_accounts()
    {
        return $this->hasMany(ApplicationAccount::class);
    }

    public function payment()
    {
        return $this->hasOne(ApplicationPayment::class);
    }

    public function refund()
    {
        return $this->hasOne(ApplicationRefund::class)->with(['bank', 'branch']);
    }

    public function directors()
    {
        return $this->hasMany(ApplicationDirector::class);
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by', 'id');
    }
}
