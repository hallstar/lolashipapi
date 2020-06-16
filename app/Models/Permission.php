<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'title',
        'created_at',
        'updated_at',
    ];

    public function getCreatedAtAttribute($value)
    {
        return normalizeDate($value);
    }

    public function getUpdatedAtAttribute($value)
    {
        return normalizeDate($value);
    }
}
