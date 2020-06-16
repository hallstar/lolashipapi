<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationRefund extends Model
{
    //

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'application_id',
        'bank_id',
        'bank_branch_id',
        'type',
        'bank_name',
        'branch_name',
        'branch_number',
        'bank_account_type',
        'bank_account_number',
        'bic',
        'broker_account_number',
    ];

    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = mutate($value);
    }

    public function getAmountAttribute($value)
    {
        return normalize($value);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }

    public function branch()
    {
        return $this->belongsTo(BankBranch::class, 'branch_id');
    }
}
