<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function getCreatedAtAttribute($value)
    {
        return normalizeDate($value);
    }

    public function getUpdatedAtAttribute($value)
    {
        return normalizeDate($value);
    }

    public function branches()
    {
        return $this->hasMany(BankBranch::class);
    }
}
