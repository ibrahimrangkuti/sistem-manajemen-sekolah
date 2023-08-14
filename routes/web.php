<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use App\Http\Controllers\Admin\ClassController as AdminClassController;
use App\Http\Controllers\Admin\TeacherController as AdminTeacherController;
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
    Route::prefix('class')->name('class.')->group(function () {
        Route::get('/', [AdminClassController::class, 'index'])->name('index');
        Route::get('/create', [AdminClassController::class, 'create'])->name('create');
        Route::post('/create', [AdminClassController::class, 'store'])->name('store');
    });
    Route::prefix('student')->name('student.')->group(function () {
        Route::get('/', [AdminStudentController::class, 'index'])->name('index');
    });
    Route::prefix('teacher')->name('teacher.')->group(function () {
        Route::get('/', [AdminTeacherController::class, 'index'])->name('index');
        Route::get('/create', [AdminTeacherController::class, 'create'])->name('create');
        Route::post('/create', [AdminTeacherController::class, 'store'])->name('store');
    });
});
