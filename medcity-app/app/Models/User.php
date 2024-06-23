<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laratrust\Traits\LaratrustUserTrait;
use App\Models\File;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
    use LaratrustUserTrait;
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'name',
        'email',
        'password',
        'country',
        'role_id',
        'mobile',
        'image',
        'lang'
    ];

    public function files() {
        return $this->hasMany( File::class );
    }
}
