<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PouzivatelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

// Main
Route::get('/', function () {
    return view('main');
});
Route::get('/category/{nazov}', [CategoryController::class, 'show']);
Route::get('/product/{id}', [ProductController::class, 'show']);
//Route::get('/productPage', function () {
//    return view('/productPage');
//});


// Cart
Route::get('/cart', function () {
    return view('cart/cart');
});
Route::post('/kosik/cart', [CartController::class, 'pridat']);
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


// Profile
Route::get('/profileOverview', [AuthController::class, 'profile']);
Route::get('/profileOrders', function () {
    return view('profile/profileOrders');
});
Route::get('/profileFavourites', function () {
    return view('profile/profileFavourites');
});
Route::get('/profileData', function () {
    return view('profile/profileData');
});
Route::get('/profilePrivacy', function () {
    return view('profile/profilePrivacy');
});
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/registration', [PouzivatelController::class, 'register']);
Route::post('/registration', [PouzivatelController::class, 'create']);

// Admin
Route::get('/adminUsers', [PouzivatelController::class, 'listUsers']);
Route::get('/adminUsers/{id}/edit', [PouzivatelController::class, 'edit']);
Route::post('/adminUsers/{id}/update', [PouzivatelController::class, 'update']);
Route::post('/adminUsers/{id}/delete', [PouzivatelController::class, 'delete']);
Route::get('/adminDashboard', function () {
    return view('admin/adminDashboard');
});
Route::get('/adminCategories', function () {
    return view('admin/adminCategories');
});
Route::get('/adminProducts', function () {
    return view('admin/adminProducts');
});
Route::get('/adminOrders', function () {
    return view('admin/adminOrders');
});

// Footer
Route::get('/aboutUs', function () {
    return view('footer/aboutUs');
});
Route::get('/kontakt', function () {
    return view('footer/kontakt');
});
Route::get('/reklamacia', function () {
    return view('footer/reklamacia');
});
Route::get('/shipping', function () {
    return view('footer/shipping');
});
Route::get('/warranty', function () {
    return view('footer/warranty');
});
Route::get('/zmluvnePodmienky', function () {
    return view('footer/zmluvnePodmienky');
});