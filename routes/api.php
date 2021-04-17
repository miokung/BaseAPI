<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Auth Controller
Route::get('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'register']);

// After Login Group Controller
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('logout', [UserController::class, 'logout']);
    Route::get('refresh', [UserController::class, 'refresh']);
    Route::get('me', [UserController::class, 'me']);
});
