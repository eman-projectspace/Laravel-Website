<?php


use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
// use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Middleware\IsAdmin;
use App\Models\Product;

// Static Home
Route::view('/', 'index');

// Shop
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/product/{id}', [ShopController::class, 'show']);
Route::get('/products/create', [ShopController::class, 'create'])->name('products.create');
Route::post('/products', [ShopController::class, 'store'])->name('products.store');


// Catrgory
Route::get('/category/{category}', [ShopController::class, 'category'])->name('category');


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


Route::middleware(['auth', IsAdmin::class])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

// Navbar Routes

Route::get('/fiction', function () {
    $books = Product::where('category', 'Fiction')->get();
    return view('fiction', compact('books'));
});


Route::get('/NonFiction', function () {
    $books = Product::where('category', 'NonFiction')->get();
    return view('NonFiction', compact('books'));
});


Route::get('/Children', function () {
    $books = Product::where('category', 'Children')->get();
    return view('Children', compact('books'));
});

Route::get('/Stationery', function () {
    return view('Stationery');
});

Route::get('/Toys', function () {
    return view('Toys');
});
