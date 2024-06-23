<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WelcomeVoice extends Model {
    use HasFactory;
    protected $table = 'welcome_voices';
    protected $fillable = [
        'welcome_voice_path'
    ];
}
