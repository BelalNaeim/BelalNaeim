<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuccessVoice extends Model {
    use HasFactory;
    protected $table = 'success_voices';
    protected $fillable = [
        'success_voice_path'
    ];
}
