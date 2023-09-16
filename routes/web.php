<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\PurchaseDetailsController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WishlistController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('nocache')->group(function() {
    // Landing Page
    Route::get('/', function () {
        $products = Product::groupBy('name')->latest()->limit(6)->get();
        $categories = Category::all();
        return view('index', compact('products', 'categories'));
    })->name('index');

    Route::get('/about', function() {
        return view('about');
    })->name('about');

    // Product Pages
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

    // Cart & Checkout
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::patch('/cart/update/{product}', [CartController::class, 'update'])->name('cart.update');
    Route::get('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/cart/move/{product}', [CartController::class, 'moveToWishlist'])->name('cart.move');
    Route::resource('checkout', CheckoutController::class)->only(['index', 'store']);

    // Wishlist
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::get('/wishlist/add/{product}', [WishlistController::class, 'add'])->name('wishlist.add');
    Route::get('/wishlist/remove/{product}', [WishlistController::class, 'remove'])->name('wishlist.remove');


    Auth::routes();

    // User Profile
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::put('/home/{user}', [HomeController::class, 'updateProfile'])->name('home.update');
    Route::put('/home/password/{user}', [HomeController::class, 'changePassword'])->name('home.password_update');

    Route::post('/review/add/{product}', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/review/remove/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

    // Admin Login
    Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [LoginController::class, 'login']);



    // Admin Routes
    Route::middleware('auth:admin')->group(function () {
        Route::prefix('admin')->name('admin.')->group(function() {
            // Admin Dashboard & Profile
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
            Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
            Route::put('/profile/update/{admin}', [DashboardController::class, 'update'])->name('profile.update');
            Route::put('/profile/password/{admin}', [DashboardController::class, 'changePassword'])->name('profile.password_update');

            // Admin Functions
            Route::resources([
                'categories' => CategoryController::class,
                'brands' => BrandController::class,
                'products' =>\App\Http\Controllers\Admin\ProductController::class,
                'suppliers' => SupplierController::class,
            ], ['except' => ['show']]);
            Route::resource('purchases', PurchaseController::class)->except(['update', 'edit']);

            Route::prefix('purchases')->name('purchases.')->group(function() {
                Route::post('/add', [PurchaseDetailsController::class, 'addProduct'])->name('add');
                Route::get('/remove/{product}', [PurchaseDetailsController::class, 'remove'])->name('remove');
                Route::get('/approve/{purchase}', [PurchaseController::class, 'approve'])->name('approve');
                Route::get('/complete/{purchase}', [PurchaseController::class, 'complete'])->name('complete');
            });

            Route::prefix('orders')->name('orders.')->group(function() {
                Route::get('/', [OrderController::class, 'index'])->name('index');
                Route::get('/{order}', [OrderController::class, 'show'])->name('show');
                Route::delete('/{order}', [OrderController::class, 'destroy'])->name('destroy');
                Route::get('/deliver/{order}', [OrderController::class, 'deliver'])->name('deliver');
                Route::get('/complete/{order}', [OrderController::class, 'complete'])->name('complete');
            });

            Route::prefix('admins')->name('admins.')->group(function() {
                Route::get('/', [AdminController::class, 'index'])->name('index');
                Route::get('/create', [AdminController::class, 'create'])->name('create');
                Route::post('/create', [AdminController::class, 'store'])->name('store');
                Route::get('/edit/{admin}', [AdminController::class, 'edit'])->name('edit');
                Route::post('/edit/{admin}', [AdminController::class, 'update'])->name('update');
                Route::delete('/{admin}', [AdminController::class, 'destroy'])->name('destroy');
            });
        });
    });

});


//Route::fallback(function() {
//    abort(404);
//});
