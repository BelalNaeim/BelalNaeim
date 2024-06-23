<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newp extends Model
{
    protected $fillable = [
        'title', 'writer','date',
        'project_id', 'description', 'image', 
        'created_at', 'updated_at','vedio'
    ];
    public function photos()
    {
        return $this->hasMany('App\Models\Photo');
    }
    
    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }
}
