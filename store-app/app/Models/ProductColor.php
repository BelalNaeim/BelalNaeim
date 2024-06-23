<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;
    protected $table = 'product_colors';
    protected $fillable = [
        `id`, `product_id`, `coloe`, `created_at`, `updated_at`
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function productcolorsize(){
        return $this->hasMany(ProductColorSize::class);
    }
}
