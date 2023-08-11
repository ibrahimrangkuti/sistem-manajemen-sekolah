<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/forum', [PagesController::class, 'forum']);
Route::get('/lowongan', [PagesController::class, 'vacancy']);

Route::get('/login', [AuthController::class, 'login']);

// Route::get('/dashboard', [DashboardController::class, 'dashboard']);
// Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
});
