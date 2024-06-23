<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model {
    use HasFactory;
    protected $table = 'trainers';
    protected $fillable  = [
        'FullName',
        'mobile_number',
        'Gender',
        'Age',
        'start_work_date',
        'Exercise_specialties',
        'certifcates'
    ];
}
