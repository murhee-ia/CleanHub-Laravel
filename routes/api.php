<?php

use App\Http\Controllers\AuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('/auth')->controller(AuthenticationController::class)->group(function () {
  Route::post('/register', 'registerUser');
  Route::post('/login', 'loginUser');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(AuthenticationController::class)->group(function() {
        Route::post('/logout', 'logoutUser');
        Route::post('/refresh', 'refresh');
        Route::put('/update-password', 'updateUserPassword');
    });
});