<?php

namespace App\Features\Users\Controllers;

use App\Features\Users\Models\User;
use App\Http\Controllers\Controller;
use App\Features\Users\Request\CreateUserRequest;
use App\Features\Users\Request\UpdateUserRequest;
use App\Features\Users\Services\UserService;

class UserController extends Controller
{
    public function __construct(
        private UserService $userService
    ) {
    }
    public function store(CreateUserRequest $request)
    {
        $user = $this->userService->create(
            $request->validated()
        );

        return response()->json($user, 201);
    }
    public function update(UpdateUserRequest $request)
    {
        $user = $this->userService->update(
            auth()->user(),
            $request->validated()
        );

        return response()->json($user, 200);
    }
    public function toggle(User $user){
        $currentUser = auth('api')->user();
        $upUser = $this->userService->toggleStatus($currentUser, $user);

        return response()->json($upUser->isActive, 200);
    }
}
