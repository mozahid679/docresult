<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\Settings;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'searchForm'])->name('home');
Route::post('/', [HomeController::class, 'search'])->name('home');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/upload', [ResultController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('results.upload');

Route::post('/upload', [ResultController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('results.store');

// Route::resource('results', ResultController::class)
//     ->only(['index', 'create', 'store'])
//     ->middleware(['auth', 'verified']);

Route::get('/search', [ResultController::class, 'searchForm'])->name('results.searchForm');
Route::post('/search', [ResultController::class, 'search'])->name('results.search');


Route::middleware(['auth'])->group(function () {
    Route::get('settings/profile', [Settings\ProfileController::class, 'edit'])->name('settings.profile.edit');
    Route::put('settings/profile', [Settings\ProfileController::class, 'update'])->name('settings.profile.update');
    Route::delete('settings/profile', [Settings\ProfileController::class, 'destroy'])->name('settings.profile.destroy');
    Route::get('settings/password', [Settings\PasswordController::class, 'edit'])->name('settings.password.edit');
    Route::put('settings/password', [Settings\PasswordController::class, 'update'])->name('settings.password.update');
    Route::get('settings/appearance', [Settings\AppearanceController::class, 'edit'])->name('settings.appearance.edit');
});

require __DIR__ . '/auth.php';
