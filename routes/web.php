<?php


use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\AdminDashboardController;

// Static Home
Route::view('/', 'index');

// Shop
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/product/{id}', [ShopController::class, 'show']);
Route::get('/products/create', [ShopController::class, 'create'])->name('products.create');
Route::post('/products', [ShopController::class, 'store'])->name('products.store');

// Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');

//Checkout
Route::get('/checkout', [CheckoutController::class, 'showForm'])->name('checkout.form');
Route::post('/checkout', [CheckoutController::class, 'processCheckout'])->name('checkout.process');

// Registration
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');

// Login
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

// Logout
Route::post('/logout', [App\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('logout');
Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    // other protected routes
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});
