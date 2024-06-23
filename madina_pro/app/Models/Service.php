<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title', 'description', 'image', 'created_at', 'updated_at',
    ];

    public function projects()
    {
        return $this->hasMany('App\Models\Project');
    }
}
