<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/berita', [PagesController::class, 'news']);
Route::get('/forum', [PagesController::class, 'forum']);
Route::get('/post/detail', [PostController::class, 'show'])->name('post.show');

Route::get('/lowongan', [PagesController::class, 'vacancy']);
Route::get('/lowongan/detail', [VacancyController::class, 'show']);

Route::get('/login', [AuthController::class, 'login']);
Route::get('/portal-orangtua', function () {
    return view('pages.portalortu');
});


// Route::get('/dashboard', [DashboardController::class, 'dashboard']);
// Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
});
