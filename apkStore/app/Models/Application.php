<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model {
    use HasFactory;
    protected $table = 'apps';
    protected $fillable = [
        'uuid',
        'app_name',
        'server_id',
        'app_version',
        'logo',
        'apk_file',
        'app_link',
        'screenshots',
        'app_info',
    ];
}
