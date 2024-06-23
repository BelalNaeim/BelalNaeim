<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory;
    protected $fillable = [
        'product_name',
        'Product_code',
        'Product_quantitiy	',
        'discount_price',
        'category_id',
        'selling_price',
        'product_details',
        'video_link',
        'image_one',
        'image_two',
        'image_three',
        'status'
    ];
}
