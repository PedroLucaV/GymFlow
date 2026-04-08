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
    public function toggleStatus(User $user, User $target): User {
        if($user->role->value !== "admin" && $user->id !== $target->id){
            return abort(403, 'Not authorized');
        }

        $target->update(["isActive" => !$target->isActive]);

        if($user->id !== $target->id){
            Cache::forget($this->getUserCacheKey($target->id));
        }

        return $target;
    }
}
