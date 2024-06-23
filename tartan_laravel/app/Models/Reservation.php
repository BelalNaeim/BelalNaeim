<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'playground_id',
        'user_id',
        'date',
        'times',
        'status',
        'payment_status',
        'payment_reference',
        'payment_amount',
        'payment_method',
    ];

    protected $casts = [
        'date' => 'date',
        'user_id' => 'int',
        'playground_id' => 'int',
        'times' => 'array',
    ];

    public function playground(): BelongsTo
    {
        return $this->belongsTo(Playground::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
