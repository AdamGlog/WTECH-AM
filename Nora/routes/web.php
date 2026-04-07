<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('main');
});
Route::get('/adminDashboard', function () {
    return view('admin/adminDashboard');
});
Route::get('/cart', function () {
    return view('cart/cart');
});
Route::get('/cartShipment', function () {
    return view('cart/cartShipment');
});
Route::get('/cartData', function () {
    return view('cart/cartData');
});
Route::get('/cartSummary', function () {
    return view('cart/cartSummary');
});
Route::get('/cartCompleted', function () {
    return view('cart/cartCompleted');
});
Route::get('/categoryPage', function () {
    return view('/categoryPage');
});
Route::get('/productPage', function () {
    return view('/productPage');
});


// user routes
Route::get('/registration', [UserController::class, 'register']);
Route::post('/registration', [UserController::class, 'create']);
Route::get('/adminUsers', [UserController::class, 'listUsers']);
Route::get('/adminUsers/{id}/edit', [UserController::class, 'edit']);
Route::post('/adminUsers/{id}/update', [UserController::class, 'update']);
Route::post('/adminUsers/{id}/delete', [UserController::class, 'delete']);

Route::post('/login', [AuthController::class, 'login']);
Route::get('/profileOverview', [AuthController::class, 'profile']);
Route::post('/logout', [AuthController::class, 'logout']);