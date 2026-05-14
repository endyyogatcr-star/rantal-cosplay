<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CostumeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;

// ======================
// FRONTEND CUSTOMER (BISA DIBUKA TANPA LOGIN)
// ======================
Route::get('/', [CustomerController::class, 'index'])->name('home');
Route::get('/shop', [CustomerController::class, 'shop'])->name('shop');
Route::get('/costume/{costume}', [CustomerController::class, 'show'])->name('costume.show');

// Auth Routes dari Breeze
require __DIR__.'/auth.php';

// ======================
// DASHBOARD & PROFILE (HARUS LOGIN)
// ======================
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return view('dashboard');
    })->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ======================
// ADMIN ROUTES (Hanya Admin)
// ======================
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::resource('categories', CategoryController::class);
        Route::resource('costumes', CostumeController::class);
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class)->only(['index', 'show']);
});

Route::middleware('auth')->group(function () {

Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{costume}', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{id}', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');

    Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [App\Http\Controllers\CheckoutController::class, 'store'])->name('checkout.store');
    
    // ROUTE INI YANG KURANG
    Route::get('/order/confirm', [App\Http\Controllers\CheckoutController::class, 'confirm'])->name('order.confirm');
    Route::post('/order/store', [App\Http\Controllers\CheckoutController::class, 'storeOrder'])->name('order.store');
});