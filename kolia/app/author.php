<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class author extends Model
{
    public function books()
    {
        return $this->belongsToMany('App\books', 'books_author', 'author_id', 'book_id', 'id', 'id');
    }
}
