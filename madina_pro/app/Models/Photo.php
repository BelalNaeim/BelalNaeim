<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'image', 'newp_id', 'created_at', 'updated_at',
    ];

    public function new()
    {
        return $this->belongsTo('App\Models\Newp');
    }
}
