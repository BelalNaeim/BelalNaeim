<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model {
    use HasFactory;
    protected $fillable = [
        'category_name',
        'cat_image',
    ];

    public function products() {
        return $this->hasMany( Product::class );
    }
}
