<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    public function categories()
    {
        return $this->belongsTo('App\category', 'category_id', 'id');
    }
    public function publishers()
    {
        return $this->belongsTo('App\publisher', 'publisher_id', 'id');
    }
    public function authors()
    {
        return $this->belongsToMany('App\author', 'books_author', 'author_id', 'book_id', 'id', 'id');
    }
    public function users()
    {
        return $this->belongsToMany('App\User', 'rating', 'user_id', 'books_id', 'id', 'id');
    }
}
