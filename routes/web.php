<?php

use App\Http\Controllers\AuthController;
// Admin
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use App\Http\Controllers\Admin\ClassController as AdminClassController;
use App\Http\Controllers\Admin\TeacherController as AdminTeacherController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\DepartmentController as AdminDepartmentController;
use App\Http\Controllers\Admin\ExtracurricularController as AdminEkskulController;
use App\Http\Controllers\Admin\LessonController as AdminLessonController;
use App\Http\Controllers\Admin\ScheduleController as AdminScheduleController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;

// Guru
use App\Http\Controllers\Teacher\MyClassController as TeacherMyClassController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/berita', [PagesController::class, 'news']);
Route::get('/forum', [PagesController::class, 'forum']);
Route::get('/post/detail', [PostController::class, 'show'])->name('post.show');
Route::get('/lowongan', [PagesController::class, 'vacancy']);
Route::get('/lowongan/detail', [VacancyController::class, 'show']);
Route::get('/portal-orangtua', function () {
    return view('pages.portalortu');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin'])->name('processLogin');
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Admin
    Route::name('admin.')->group(function () {
        // Admin
        Route::get('/settings', [AdminSettingController::class, 'index'])->name('settings');
        Route::post('/settings', [AdminSettingController::class, 'update'])->name('settings.update');

        // Kelas
        Route::prefix('class')->name('class.')->group(function () {
            Route::get('/', [AdminClassController::class, 'index'])->name('index');
            Route::get('/create', [AdminClassController::class, 'create'])->name('create');
            Route::post('/create', [AdminClassController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [AdminClassController::class, 'edit'])->name('edit');
            Route::post('/edit/{id}', [AdminClassController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [AdminClassController::class, 'delete'])->name('delete');
        });

        // Siswa
        Route::prefix('student')->name('student.')->group(function () {
            Route::get('/', [AdminStudentController::class, 'index'])->name('index');
            Route::get('/create', [AdminStudentController::class, 'create'])->name('create');
            Route::post('/create', [AdminStudentController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [AdminStudentController::class, 'edit'])->name('edit');
            Route::put('/edit/{id}', [AdminStudentController::class, 'update'])->name('update');
            Route::delete('{id}', [AdminStudentController::class, 'delete'])->name('delete');
            Route::post('/import', [AdminStudentController::class, 'import'])->name('import');
        });

        // Guru
        Route::prefix('teacher')->name('teacher.')->group(function () {
            Route::get('/', [AdminTeacherController::class, 'index'])->name('index');
            Route::get('/create', [AdminTeacherController::class, 'create'])->name('create');
            Route::post('/create', [AdminTeacherController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [AdminTeacherController::class, 'edit'])->name('edit');
            Route::post('/edit/{id}', [AdminTeacherController::class, 'update'])->name('update');
            Route::delete('{id}', [AdminTeacherController::class, 'delete'])->name('delete');
        });

        // Jurusan
        Route::prefix('department')->name('department.')->group(function () {
            Route::get('/', [AdminDepartmentController::class, 'index'])->name('index');
            Route::get('/create', [AdminDepartmentController::class, 'create'])->name('create');
            Route::post('/create', [AdminDepartmentController::class, 'store'])->name('store');
            Route::post('{id}', [AdminDepartmentController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [AdminDepartmentController::class, 'delete'])->name('delete');
            Route::get('/delete-all', [AdminDepartmentController::class, 'deleteAll'])->name('deleteAll');
        });

        // Mata Pelajaran
        Route::prefix('lesson')->name('lesson.')->group(function () {
            Route::get('/', [AdminLessonController::class, 'index'])->name('index');
            Route::post('/', [AdminLessonController::class, 'store'])->name('store');
            Route::put('{id}', [AdminLessonController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [AdminLessonController::class, 'delete'])->name('delete');
        });

        // Jadwal Pelajaran
        Route::prefix('schedule')->name('schedule.')->group(function () {
            Route::get('/', [AdminScheduleController::class, 'index'])->name('index');
            Route::get('/create', [AdminScheduleController::class, 'create'])->name('create');
            Route::post('/create', [AdminScheduleController::class, 'store'])->name('store');
        });

        // Ekskul
        Route::prefix('ekskul')->name('ekskul.')->group(function () {
            Route::get('/', [AdminEkskulController::class, 'index'])->name('index');
            Route::post('/', [AdminEkskulController::class, 'store'])->name('store');
            Route::post('{id}', [AdminEkskulController::class, 'update'])->name('update');
            Route::delete('{id}', [AdminEkskulController::class, 'delete'])->name('delete');
        });

        // Berita
        Route::prefix('news')->name('news.')->group(function () {
            Route::get('/', [AdminNewsController::class, 'index'])->name('index');
            Route::post('/', [AdminNewsController::class, 'store'])->name('store');
            Route::post('{id}', [AdminNewsController::class, 'update'])->name('update');
            Route::delete('{id}', [AdminNewsController::class, 'delete'])->name('delete');
        });
    });

    Route::name('teacher.')->group(function () {
        // Kelas Saya
        Route::prefix('myclass')->name('myclass.')->group(function () {
            Route::get('/', [TeacherMyClassController::class, 'index'])->name('index');
            Route::get('/presence-history', [TeacherMyClassController::class, 'presenceHistory'])->name('presenceHistory');
        });
    });
});
