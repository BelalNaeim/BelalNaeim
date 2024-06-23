<?php

namespace App\Models;

use App\Contracts\MustVerifyPhone;
use App\Notifications\VerifyEmail;
use App\Notifications\VerifyPhone;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail, MustVerifyPhone, FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable, \App\Traits\MustVerifyPhone, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function (self $user) {
            if (config('filament-shield.filament_user.enabled')) {
                $user->assignRole(config('filament-shield.filament_user.role_name'));
            }
        });
    }

    public function otps(): MorphMany
    {
        return $this->morphMany(OTP::class, 'model');
    }

    public function sendEmailVerificationNotification()
    {
        if (!$this->email) return;
        $this->notify(new VerifyEmail);
    }

    public function sendPhoneVerificationNotification()
    {
        if (!$this->phone) return;
        $this->notify(new VerifyPhone);
    }

    public function canAccessFilament(): bool
    {
        return $this->hasRole(config('filament-shield.super_admin.role_name')) || $this->playgrounds()->exists();
    }

    public function playgrounds(): HasMany
    {
        return $this->hasMany(Playground::class);
    }

    public function canImpersonate(): bool
    {
        return $this->hasRole(config('filament-shield.super_admin.role_name'));
    }

    public function canBeImpersonated(): bool
    {
        return (!$this->hasRole(config('filament-shield.super_admin.role_name')) && $this->canAccessFilament());
    }
}
