<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class OTP extends Model
{
    use HasFactory, Prunable;

    protected $fillable = [
        'model_type',
        'model_id',
        'code',
        'target',
        'expired_at',
        'used_at',
    ];

    protected $dates = [
        'expired_at',
        'used_at',
    ];

    public function model(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     *  Check if the OTP is valid.
     *
     * @param $query
     * @return mixed
     */
    public function scopeValid($query)
    {
        return $query
            ->whereNull('used_at')
            ->where('expired_at', '>', now());
    }

    /**
     *  Check if the OTP is invalid.
     *
     * @param $query
     * @return mixed
     */
    public function scopeInValid($query)
    {
        return $query
            ->whereNotNull('used_at')
            ->orWhere('expired_at', '<', now());
    }

    /**
     * Get the prunable model query.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function prunable()
    {
        return static::inValid();
    }
}
