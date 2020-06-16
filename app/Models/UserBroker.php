<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBroker extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'broker_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->select(['id', 'first_name', 'last_name', 'email']);
    }

    public function broker()
    {
        return $this->belongsTo(Broker::class, 'broker_id')->select(['id', 'name', 'code']);
    }
}
