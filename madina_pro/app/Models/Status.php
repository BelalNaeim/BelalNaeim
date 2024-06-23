<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [
        'name','image', 'created_at', 'updated_at',
    ];

    public function projects()
    {
        return $this->belongsToMany('App\Models\Project');
    }
}

