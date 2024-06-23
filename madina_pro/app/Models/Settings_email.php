<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Settings_email extends Model
{
    protected $fillable = [
        'email','setting_id'
    ];

    public function setting()
    {
        return $this->belongsTo('App\Models\Setting');
    }

}
