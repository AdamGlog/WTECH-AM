<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('main');
});

// user routes
Route::get('/registration', [UserController::class, 'register']);
Route::post('/registration', [UserController::class, 'create']);
Route::get('/adminUsers', [UserController::class, 'listUsers']);
Route::get('/adminUsers/{id}/edit', [UserController::class, 'edit']);
Route::post('/adminUsers/{id}/update', [UserController::class, 'update']);
Route::post('/adminUsers/{id}/delete', [UserController::class, 'delete']);


Route::post('/login', [AuthController::class, 'login']);
Route::get('/adminDashboard', function () {
    return view('admin/adminDashboard');
});
Route::get('/profileOverview', [AuthController::class, 'profile']);