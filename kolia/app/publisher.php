<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class publisher extends Model
{
    public function books()
    {
        return $this->hasMany('App\books', 'publisher_id', 'id');
    }
}
