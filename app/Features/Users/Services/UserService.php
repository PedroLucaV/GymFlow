<?php

namespace App\Features\Users\Services;

use App\Features\Users\Models\User;

class UserService
{
    public function create(array $data): User
    {
        return User::create($data);
    }
}
