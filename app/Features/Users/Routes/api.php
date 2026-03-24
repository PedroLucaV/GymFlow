<?php

use Illuminate\Support\Facades\Route;
use App\Features\Users\Controllers\UserController;

Route::prefix('users')->group(function () {
    Route::post('/register', [UserController::class, 'store']);
});