<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Settings_phone extends Model
{
    protected $fillable = [
        'phone', 'setting_id'
    ];

    public function setting()
    {
        return $this->belongsTo('App\Models\Setting');
    }
}
