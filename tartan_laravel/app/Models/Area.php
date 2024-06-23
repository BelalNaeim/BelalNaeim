<?php

namespace App\Models;

use App\Traits\TranslatableWithJsonEscape;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Area extends Model
{
    use HasFactory, TranslatableWithJsonEscape;

    public $translatable = ['name'];

    protected $fillable = [
        'name',
        'city_id',
    ];

    protected $casts = [
        'city_id' => 'int',
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
