<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\Api\PerangkatController;

// user
Route::apiResource('users', UserController::class);
//perangkat 
Route::apiResource('perangkat', PerangkatController::class);
