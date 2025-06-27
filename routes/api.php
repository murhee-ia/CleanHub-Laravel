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

  Route::controller(AuthenticationController::class)->group(function() {
    Route::post('/logout', 'logoutUser');
    Route::post('/refresh', 'refresh');
    Route::put('/update-password', 'updateUserPassword');

    Route::prefix('/user')->group(function () {
      Route::get('/', function (Request $request) {
        return $request->user();
      });
      Route::put('/update/info', 'updateUserInfo');
      Route::post('/update/profile-picture', 'updateProfilePicture');
    });
  });

  Route::prefix('/jobs')->controller(JobsController::class)->group(function() {
    Route::get('/all', 'getAllJobs');
    Route::get('/categories', 'getJobCategories');
    Route::get('/saved', 'getSavedJobs');
  });

  Route::prefix('/job')->controller(JobController::class)->group(function() {
    Route::get('/{jobID}', 'getTheJob');
    Route::post('/', 'createJob');
    Route::put('/', 'updateJob');
    Route::delete('/', 'deleteJob');
    Route::put('/save', 'saveJob');
  });
    
});