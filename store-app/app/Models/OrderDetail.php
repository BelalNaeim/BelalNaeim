<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'orders_details';
    protected $fillable = [
        `id`, `order_id`, `product_color_size_id`, `quantitiy`, `price`, `discount`, `created_at`,
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function productColorSize(){
        return $this->belongsTo(ProductColorSize::class);
    }
}
