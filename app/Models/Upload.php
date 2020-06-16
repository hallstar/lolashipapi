<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    //
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'url',
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

    public function clean()
    {
        \Storage::disk('local')->delete($this->url);
    }

    public function getUrlAttribute($value)
    {
        return ($value==null ? null : generatePresignedUrl($value));
    }
}
