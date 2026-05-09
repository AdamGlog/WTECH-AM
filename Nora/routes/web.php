<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PouzivatelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\OrderController;

// Main
Route::get('/', [MainController::class, 'main']);
Route::get('/category/{nazov}', [CategoryController::class, 'show']);
Route::get('/search', [CategoryController::class, 'search']);
Route::get('/product/{id}', [ProductController::class, 'show']);
// Vsetky produkty - mega vypredaj banner
Route::get('/vsetky', [CategoryController::class, 'vsetky']);


// Cart
Route::get('/cart', function () {
    return view('cart/cart');
});
Route::post('/kosik/cart', [CartController::class, 'pridat']);
Route::post('/kosik/update', [CartController::class, 'aktualizovat']);
Route::get('/cartShipment', [CartController::class, 'zobrazDoprava']);
Route::post('/cartShipment', [CartController::class, 'ulozDoprava']);
Route::get('/cartData', [CartController::class, 'zobrazData']);
Route::post('/cartData', [CartController::class, 'ulozData']);
Route::get('/cartSummary', [CartController::class, 'zobrazSumar']);
Route::post('/cartSummary', [CartController::class, 'vytvorObjednavku']);
Route::get('/cartCompleted/{id}', [CartController::class, 'zobrazDokoncenie']);

Route::post('/wishlist/add', [AuthController::class, 'addToWishlist'])->middleware('auth');

// Profile
Route::get('/profileOverview', [AuthController::class, 'profile'])->middleware('auth');
Route::get('/profileOrders', [AuthController::class, 'showOrders'])->middleware('auth');
Route::get('/profileFavourites', [AuthController::class, 'showFavorites'])->middleware('auth');
Route::post('/wishlist/remove/{id}', [AuthController::class, 'removeFromWishlist'])->middleware('auth');
Route::get('/profileData', [AuthController::class, 'showProfileData'])->middleware('auth');
Route::post('/profileData', [AuthController::class, 'updateDetails'])->middleware('auth');
Route::get('/profilePrivacy', [AuthController::class, 'showProfilePrivateData'])->middleware('auth');
Route::post('/profilePrivacy', [AuthController::class, 'updatePassword'])->middleware('auth');
Route::post('/profilePrivacy/newsletter', [AuthController::class, 'updateNewsletterSession'])->middleware('auth');


Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/registration', [PouzivatelController::class, 'register']);
Route::post('/registration', [PouzivatelController::class, 'create']);

// Admin
Route::get('/adminUsers', [PouzivatelController::class, 'listUsers'])->middleware(['auth', 'admin']);
Route::post('/adminUsers', [PouzivatelController::class, 'store'])->middleware(['auth', 'admin']);
Route::get('/adminDashboard', function () {
    return view('admin/adminDashboard');
})->middleware(['auth', 'admin']);
Route::get('/adminCategories', [AdminCategoryController::class, 'index'])->middleware(['auth', 'admin'])->name('adminCategories');
Route::get('/adminProducts', [AdminProductController::class, 'index'])->middleware(['auth', 'admin']);
Route::get('/adminOrders', [OrderController::class, 'index'])->middleware(['auth', 'admin'])->name('adminOrders');

Route::put('/adminUsers/{user}', [PouzivatelController::class, 'update'])->middleware(['auth', 'admin']);
Route::delete('/adminUsers/{user}', [PouzivatelController::class, 'delete'])->middleware(['auth', 'admin']);

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