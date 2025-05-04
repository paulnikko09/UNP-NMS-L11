<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\PollingController;
use App\Http\Controllers\DashboardController;

Route::get('/map/devices', [MapController::class, 'data']);
Route::get('/dashboard/stats', [DashboardController::class, 'stats']);
Route::get('/devices', [DeviceController::class, 'index']);
Route::post('/devices/{device}/poll', [PollingController::class, 'pollNow']);
