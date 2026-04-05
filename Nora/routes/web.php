<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/adminDashboard', function () {
    return view('admin/adminDashboard');
});
Route::get('/adminUsers', [AdminController::class, 'listUsers']);