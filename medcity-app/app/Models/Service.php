<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model {
    use HasFactory;
    protected $guarded;
    protected $casts = [
        'name' => 'array',
        'description'=>'array'
    ];
    protected $fillable = [
        'name',
        'description',
        'image',
        'user_id'
    ];
    protected function asJson( $value ) {
        return json_encode( $value, JSON_UNESCAPED_UNICODE );
    }
}
