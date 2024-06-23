<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StartVoice extends Model {
    use HasFactory;
    protected $table = 'start_voices';
    protected $fillable = [
        'start_voice_path'
    ];
}
