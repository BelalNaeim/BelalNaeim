<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name', 'space', 'budget', 
        'start_date', 'end_date', 'contractor_name', 
        'consultant_name', 'description', 'image', 
        'location', 'size', 'flage', 'type_id', 'governorate_id','user_id',
        'created_at', 'updated_at','status','main_photo','gallery'
    ];
    public function galleries()
    {
        return $this->hasMany('App\Models\Gallery');
    }
    public function news()
    {
        return $this->hasMany('App\Models\Newp');
    }
    
    public function type()
    {
        return $this->belongsTo('App\Models\Type');
    }

    public function governorate()
    {
        return $this->belongsTo('App\Models\Governorate');
    }

    public function statuses()
    {
        return $this->belongsToMany('App\Models\Status');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
