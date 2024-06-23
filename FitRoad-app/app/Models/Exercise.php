<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model {
    use HasFactory;
    protected $table = 'exercises';
    protected $fillable = [
        'exercise_name',
        'Duration',
        'burned_calories',
        'for_over_weight',
        'target_body_area',
        'exercise_video'
    ];
}
