<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model {
    use HasFactory;
    protected $casts = [
        'title' => 'array',
        'description'=>'array'
    ];
    protected $fillable = [
        'title',
        'description',
        'image'
    ];
    protected function asJson( $value ) {
        return json_encode( $value, JSON_UNESCAPED_UNICODE );
    }
}
