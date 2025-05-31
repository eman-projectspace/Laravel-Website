<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StationeryController;
use App\Http\Controllers\ToyController;
use App\Http\Middleware\IsAdmin;
use App\Models\Product;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SuggestionController;

Route::post('/suggestions', [SuggestionController::class, 'store'])->name('suggestions.store');

//               Public Routes 
Route::view('/', 'index');

Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/product/{id}', [ShopController::class, 'show']);
Route::get('/category/{category}', [ShopController::class, 'category'])->name('category');

// Category Views (Navbar)
Route::get('/fiction', fn() => view('fiction', ['books' => Product::where('category', 'Fiction')->get()]));
Route::get('/NonFiction', fn() => view('NonFiction', ['books' => Product::where('category', 'NonFiction')->get()]));
Route::get('/Children', fn() => view('Children', ['books' => Product::where('category', 'Children')->get()]));
Route::get('/history', fn() => view('history', ['books' => Product::where('category', 'History')->get()]))->name('history');
Route::get('/Stationery', fn() => view('Stationery'));
Route::get('/Toys', fn() => view('Toys'));
Route::get('/about', fn() => view('about'));

//      Authentication Routes  
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/logout', [App\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('logout');

//                   Authenticated User Routes 
Route::middleware(['auth'])->group(function () {
    // Cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');

    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'showForm'])->name('checkout.form');
    Route::post('/checkout', [CheckoutController::class, 'processCheckout'])->name('checkout.process');

    // Profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

//                Admin Routes (Admin Only) 
Route::middleware(['auth', IsAdmin::class])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Users
    Route::get('/users', [AdminDashboardController::class, 'showUsers'])->name('admin.users');

    // Products
    Route::get('/products', [AdminDashboardController::class, 'showProducts'])->name('admin.products');
    Route::get('/products/create', [ShopController::class, 'create'])->name('products.create');
    Route::post('/products', [ShopController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [AdminDashboardController::class, 'editProduct'])->name('admin.products.edit');
    Route::put('/products/{id}', [AdminDashboardController::class, 'updateProduct'])->name('admin.products.update');
    Route::delete('/products/{id}', [AdminDashboardController::class, 'deleteProduct'])->name('admin.products.delete');

    // Orders
  Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');


    // Stationery
    Route::get('/stationery/create', [StationeryController::class, 'create'])->name('stationery.create');
    Route::post('/stationery/store', [StationeryController::class, 'store'])->name('stationery.store');

    // Toys
    Route::get('/toys/create', [ToyController::class, 'create'])->name('toys.create');
    Route::post('/toys/store', [ToyController::class, 'store'])->name('toys.store');
});


// Route::prefix('admin')->group(function () {
// Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders.index');


// });