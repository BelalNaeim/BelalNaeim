<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodSystem extends Model {
    use HasFactory;
    protected $table = 'foodsystems';
    protected $fillable = [
        'food_system_name',
        'total_day_calories',
        'meals_number',
        'for_over_weight',
        'food_system_content'
    ];
}
