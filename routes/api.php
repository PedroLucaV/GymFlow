<?php

use Illuminate\Support\Facades\Route;
require base_path('app/Features/Users/Routes/api.php');
require base_path('app/Features/Auth/Routes/api.php');

Route::get('/health', fn() => ['status' => 'ok']);