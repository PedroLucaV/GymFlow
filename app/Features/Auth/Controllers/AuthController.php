<?php

namespace App\Features\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Features\Auth\Request\LoginRequest;
use App\Features\Auth\Services\AuthService;

class AuthController extends Controller
{
    public function __construct(
        protected AuthService $authService
    ) {}

    public function login(LoginRequest $request)
    {
        return response()->json(
            $this->authService->login(
                $request->email,
                $request->password
            )
        );
    }

    public function me()
    {
        return response()->json(
            $this->authService->me()
        );
    }

    public function logout()
    {
        $this->authService->logout();

        return response()->json([
            'message' => 'Logged out successfully',
        ]);
    }
}
