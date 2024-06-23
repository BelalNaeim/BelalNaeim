<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table ='settings';
    protected $fillable = [
        'id', 'title', 'descrioption', 'address', 'phone', 'logo', 'favicon', 'facebook', 'twitter', 'tiktok', 'youtube', 'instagram', 'created_at', 'updated_at'
    ];
}
