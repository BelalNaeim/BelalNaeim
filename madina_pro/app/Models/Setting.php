<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'website_link', 'facebook_link', 
        'instgram_link', 'youtube_link','twitter_link'
    ];

    public function emails()
    {
        return $this->hasMany('App\Models\Settings_email');
    }
    public function phones()
    {
        return $this->hasMany('App\Models\Settings_phone');
    }
}
