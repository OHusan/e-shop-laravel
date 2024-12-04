<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\BaseController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ProductListController;
use App\Http\Controllers\User\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\RedirectAdmin;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


//user routes

Route::get('/', [UserController::class,'index'])->name('home');
Route::get('/contact-us', [BaseController::class, 'contactUs'])->name('contact-us');
Route::post('/send-mail', [BaseController::class, 'sendMail'])->name('send-mail');
Route::get('/about-us', [BaseController::class, 'aboutUs'])->name('about-us');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//end

//admin routes

Route::group(['prefix' => 'admin', 'middleware' => RedirectAdmin::class], function () {
    Route::get('login', [AdminAuthController::class,'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminAuthController::class,'login'])->name('admin.login.post');
    Route::post('logout', [AdminAuthController::class,'logout'])->name('admin.logout');
});

Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');

    Route::post('/products/store',[ProductController::class,'store'])->name('admin.products.store');
    Route::put('/products/update/{id}',[ProductController::class,'update'])->name('admin.products.update');
    Route::delete('/products/destroy/{id}',[ProductController::class,'destroy'])->name('admin.products.destroy');
});
//end

//CART
Route::prefix('cart')->controller(CartController::class)->group(function () {
    Route::get('view', 'view')->name('cart.view');
    Route::post('store/{product}', 'store')->name('cart.store');
    Route::patch('update/{product}', 'update')->name('cart.update');
    Route::delete('delete/{product}', 'delete')->name('cart.delete');
});

Route::post('/cart-mail', [CartController::class, 'cartMail'])->name('cart.mail');

//end

//PRODUCTS
Route::prefix('products')->controller(ProductListController::class)->group(function () {
    Route::get('/', 'index')->name('products.index');
    Route::get('/{product:slug}', 'detail')->name('products.detail');
    Route::post('/titles', 'filter')->name('products.titles');
});

require __DIR__ . '/auth.php';
