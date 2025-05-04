<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;


// Public route
Route::get('/', function () {
    return view('welcome');
});

// Dashboard (authenticated)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Authenticated user routes
    Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Device routes
    Route::resource('devices', DeviceController::class);

    // Individual device detail
    Route::get('/devices/{device}', [DeviceController::class, 'show'])->name('devices.show');
    Route::post('/devices/{device}/poll', [DeviceController::class, 'poll'])->name('devices.poll');

});

require __DIR__.'/auth.php';
