<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'image', 'project_id', 'created_at', 'updated_at',
    ];

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }
}
