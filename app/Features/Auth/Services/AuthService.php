<?php

namespace App\Features\Auth\Services;

use App\Features\Users\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function login(string $email, string $password): array
    {
        if (!$token = JWTAuth::attempt([
            'email' => $email,
            'password' => $password,
        ])) {
            throw ValidationException::withMessages([
                'email' => ['Invalid credentials'],
            ]);
        }

        $user = auth()->user();

        if (!$user->isActive) {
            JWTAuth::invalidate($token);

            throw ValidationException::withMessages([
                'email' => ['User is inactive'],
            ]);
        }

        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => $user,
        ];
    }

    public function logout(): void
    {
        JWTAuth::invalidate(JWTAuth::getToken());
    }

    public function me(): User
    {
        return auth()->user();
    }
}
