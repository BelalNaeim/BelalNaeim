<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProblemVoice extends Model {
    use HasFactory;
    protected $table = 'problem_voices';
    protected $fillable = [
        'probelm_voice_path'
    ];
}
