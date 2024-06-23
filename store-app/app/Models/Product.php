<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        `id`, `name`, `image`, `description`, `price`, `discount_price`, `category_id`, `created_at`, `updated_at`, `deleted_at`
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function color(){
        $this->hasMany(ProductColor::class);
    }

    public function size(){
        $this->hasMany(ProductSize::class);
    }

    public function productcolorsize(){
        $this->hasMany(ProductColorSize::class);
    }
}
