<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobsController;

Route::prefix('/auth')->controller(AuthenticationController::class)->group(function () {
  Route::post('/register', 'registerUser');
  Route::post('/login', 'loginUser');
});

Route::middleware('auth:sanctum')->group(function () {
  Route::get('/user', function (Request $request) {
    return $request->user();
  });

  Route::controller(AuthenticationController::class)->group(function() {
    Route::post('/logout', 'logoutUser');
    Route::post('/refresh', 'refresh');
    Route::put('/update-password', 'updateUserPassword');
  });

  Route::prefix('/jobs')->controller(JobsController::class)->group(function() {
    Route::get('/all', 'getAllJobs');
  });

  Route::prefix('/job')->controller(JobController::class)->group(function() {
    Route::get('/', 'getTheJob');
    Route::post('/', 'createJob');
    Route::put('/', 'updateJob');
    Route::delete('/', 'deleteJob');
  });
    
});