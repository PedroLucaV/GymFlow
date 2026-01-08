<?php

namespace App\Features\User\Services;

use App\Features\User\Models\User;

class UserService
{
    public function create(array $data): User
    {
        return User::create($data);
    }
}
