<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/main', function () {
    return view('main');
});
Route::get('/profileOverview', function () {
    return view('profile/profileOverview');
})->name('profileOverview');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/adminDashboard', function () {
    return view('admin/adminDashboard');
});
Route::get('/adminUsers', [AdminController::class, 'listUsers']);