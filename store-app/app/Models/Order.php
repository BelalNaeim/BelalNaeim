<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        `id`, `user_id`, `status`, `payment_status`, `payment_method`, `payment_id`, `total_price`, `address`, `phone`, `name`, `surname`, `city`, `postal_code`, `country`, `shipping_price`, `created_at`, `updated_at`
    ];
}
