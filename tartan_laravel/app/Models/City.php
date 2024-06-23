<?php

namespace App\Models;

use App\Traits\TranslatableWithJsonEscape;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class City extends Model
{
    use HasFactory, TranslatableWithJsonEscape;

    public $translatable = ['name'];

    protected $fillable = [
        'name',
    ];

    public function areas(): HasMany
    {
        return $this->hasMany(Area::class);
    }
}
