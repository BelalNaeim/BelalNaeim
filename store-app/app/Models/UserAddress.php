<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;
    protected $table = 'user_address';
    protected $fillable = [
        `id`, `user_id`, `address`, `city`, `state`, `country`, `postal_code`, `phone`, `email`, `name`, `sur_name`, `deleted_at`, `created_at`, `updated_at`
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
