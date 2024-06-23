<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipient extends Model {
    use HasFactory;
    protected $table = 'recipients';

    public $timestamps = false;

    protected $casts = [
        'read_at' => 'datetime',
    ];

    public function message() {
        return $this->belongsTo( Message::class );
    }

    public function user() {
        return $this->belongsTo( User::class );
    }
}
