<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CostumeController;
use App\Http\Controllers\ProfileController;

// ======================
// FRONTEND ROUTES (Customer)
// ======================
Route::get('/', function () {
    return view('welcome');
});

// ======================
// AUTH ROUTES (dari Breeze)
// ======================
require __DIR__.'/auth.php';

// ======================
// ADMIN ROUTES (Hanya untuk Admin)
// ======================
Route::prefix('admin')
    ->name('admin.')      // Middleware auth + role admin
    ->group(function () {

    // Dashboard Admin
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Categories
    Route::resource('categories', CategoryController::class);

    // Costumes
    Route::resource('costumes', CostumeController::class);

});

// ======================
// USER PROFILE (opsional)
// ======================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});