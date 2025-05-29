<?php


use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
// use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Middleware\IsAdmin;
use App\Models\Product;
use App\Http\Controllers\ProfileController;

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

//  Auth middleware Protection

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    // other protected routes
});

// User Profile 

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
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



Route::get('/history', function () {
    $books = Product::where('category', 'History')->get();
    return view('history', compact('books'));
})->name('history');



Route::get('/Stationery', function () {
    return view('Stationery');
});

Route::get('/Toys', function () {
    return view('Toys');
});

// Stationery routes
Route::get('/stationery/create', [StationeryController::class, 'create'])->name('stationery.create');
Route::post('/stationery/store', [StationeryController::class, 'store'])->name('stationery.store');

// Toys routes
Route::get('/toys/create', [ToyController::class, 'create'])->name('toys.create');
Route::post('/toys/store', [ToyController::class, 'store'])->name('toys.store');




Route::middleware(['auth', IsAdmin::class])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', [AdminDashboardController::class, 'showUsers'])->name('admin.users');
    Route::get('/products', [AdminDashboardController::class, 'showProducts'])->name('admin.products');
// Edit + Delete
Route::get('/products/{id}/edit', [AdminDashboardController::class, 'editProduct'])->name('admin.products.edit');
Route::put('/products/{id}', [AdminDashboardController::class, 'updateProduct'])->name('admin.products.update');
Route::delete('/products/{id}', [AdminDashboardController::class, 'deleteProduct'])->name('admin.products.delete');
Route::get('/admin/orders', [AdminDashboardController::class, 'showOrders'])->name('admin.orders');

});

Route::get('/about', function () {
    return view('about');
});




Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});
