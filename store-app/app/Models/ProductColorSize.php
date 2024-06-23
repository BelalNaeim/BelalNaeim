<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColorSize extends Model
{
    use HasFactory;
    protected $table = 'product_color_size';
    protected $fillable = [`id`, `product_size_id`, `product_color_id`, `quantity`, `price_two`, `discount`, `status`, `created_at`, `updated_at`];

    public function product_size(){
        return $this->belongsTo(ProductSize::class);
    }

    public function product_color(){
        return $this->belongsTo(ProductColor::class);
    }

    public function orderdetails(){
        return $this->hasMany(OrderDetail::class);
    }
}
