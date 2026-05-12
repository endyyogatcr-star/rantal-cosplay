<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CostumeController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

// Auth Routes dari Breeze
require __DIR__.'/auth.php';

// ======================
// DASHBOARD REDIRECT (Paling Penting)
// ======================
Route::get('/dashboard', function () {
    $user = auth()->user();
    
    if ($user && $user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    
    return view('dashboard'); // untuk user biasa
})->middleware('auth')->name('dashboard');

// ======================
// ADMIN ROUTES
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
    });

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});