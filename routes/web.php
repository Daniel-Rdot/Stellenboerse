<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', \App\Http\Controllers\UserController::class)
    ->only(['create', 'edit',]);

Route::resource('companies', \App\Http\Controllers\CompanyController::class)
    ->only(['create', 'edit',]);

Route::resource('jobs', \App\Http\Controllers\JobController::class)
    ->only(['create', 'edit',]);

Route::resource('images', \App\Http\Controllers\ImageController::class)
    ->only(['create', 'edit',]);

Route::resource('tags', \App\Http\Controllers\TagController::class)
    ->only(['create', 'edit',]);
