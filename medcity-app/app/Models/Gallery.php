<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model {
    use HasFactory;
    protected $guarded;
    protected $casts = [
        'name' => 'array',
    ];
    protected $fillable = [
        'name',
        'photo',
        'type'
    ];
    protected function asJson( $value ) {
        return json_encode( $value, JSON_UNESCAPED_UNICODE );
    }
}
