<?php

namespace App\Models;

use Grosv\LaravelPasswordlessLogin\Traits\PasswordlessLogin;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, PasswordlessLogin;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
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
    ];

    public function getGuardNameAttribute(): string 
    {
        return config('laravel-passwordless-login.user_guard');
    }
    
    public function getShouldRememberLoginAttribute(): bool
    {
        return config('laravel-passwordless-login.remember_login');
    }

    public function getLoginRouteExpiresInAttribute(): int
    {
        return config('laravel-passwordless-login.login_route_expires');
    }

    public function getRedirectUrlAttribute(): string
    {
        return config('laravel-passwordless-login.redirect_on_success');
    }
}
