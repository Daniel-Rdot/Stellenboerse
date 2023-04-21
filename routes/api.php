<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('users', \App\Http\Controllers\UserController::class);

Route::apiResource('companies', \App\Http\Controllers\CompanyController::class);

Route::apiResource('jobs', \App\Http\Controllers\JobController::class);

Route::apiResource('images', \App\Http\Controllers\ImageController::class);

Route::apiResource('tags', \App\Http\Controllers\TagController::class);
