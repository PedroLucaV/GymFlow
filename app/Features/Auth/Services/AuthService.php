<?php

namespace App\Features\Auth\Services;

use App\Features\Users\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Cache;

class AuthService
{

    private function getUserCacheKey(int $userId): string
    {
        return "user_profile:{$userId}";
    }

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

        Cache::put($this->getUserCacheKey($user->id), $user, now()->addMinutes(60));

        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => $user,
        ];
    }

    public function logout(): void
    {
        Cache::forget($this->getUserCacheKey(auth()->id()));
        JWTAuth::invalidate(JWTAuth::getToken());
    }

    public function me(): User
    {
        $userId = auth()->id();
        return Cache::remember($this->getUserCacheKey($userId), now()->addMinutes(60), function () {
            return auth()->user();
        });
    }
}
