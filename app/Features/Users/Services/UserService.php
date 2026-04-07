<?php

namespace App\Features\Users\Services;

use App\Features\Users\Models\User;
use Illuminate\Support\Facades\Cache;

class UserService
{
    private function getUserCacheKey(string $userId): string
    {
        return "user_profile:{$userId}";
    }
    public function create(array $data): User
    {
        return User::create($data);
    }

    public function update(User $user, array $data): User
    {
        $user->update($data);

        Cache::forget($this->getUserCacheKey(auth()->id()));

        return $user;
    }
}
