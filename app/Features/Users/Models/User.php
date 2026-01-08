<?php

namespace App\Features\User\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Enums\UserRole;


class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'role' => UserRole::class,
    ];

    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn($value) => Hash::make($value),
        );
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [
            'role' => $this->role,
        ];
    }
}
