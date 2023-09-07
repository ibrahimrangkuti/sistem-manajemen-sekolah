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
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

// Guru
use App\Http\Controllers\Teacher\MyClassController as TeacherMyClassController;
use App\Http\Controllers\Teacher\MyDepartmentController as TeacherMyDepartmentController;
use App\Http\Controllers\Teacher\ScheduleController as TeacherScheduleController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\MessageController;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/berita', [PagesController::class, 'news'])->name('news');
Route::get('/forum', [PagesController::class, 'forum'])->name('forum');
// Route::get('/post/detail/{slug}', [PostController::class, 'show'])->name('post.show');
Route::get('/berita/{slug}', [PagesController::class, 'showNews'])->name('news.show');
Route::get('/forum/{slug}', [PagesController::class, 'showForum'])->name('forum.show');
Route::post('/forum/{slug}', [PagesController::class, 'addComentar'])->name('forum.add-comentar');
Route::get('/portal-orangtua', function () {
    if (Auth::check()) {
        Alert::error('Gagal!', 'Anda sudah login!');
        return back();
    }

    return view('pages.portalortu');
});
Route::post('/portal-orangtua', [AuthController::class, 'loginOrangTua'])->name('ortu.login');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin'])->name('processLogin');
Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgotPassword');;
Route::post('/forgot-password', [AuthController::class, 'processForgotPassword'])->name('processForgotPassword');;
Route::get('/reset-password/{token}', function (string $token) {
    return view('pages.auth.reset-password', ['token' => $token]);
})->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'processResetPassword'])->name('password.update');
Route::get('/logout', function () {
    if (!Auth::check()) {
        return back();
    }

    Auth::logout();
    return redirect()->route('login');
})->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::put('/parent-profile', [ProfileController::class, 'updateParentProfile'])->name('parent.profile.update');
    Route::post('/change-password', [ProfileController::class, 'changePassword'])->name('changePassword');

    // Message
    Route::prefix('messages')->name('message.')->group(function () {
        Route::get('/', [MessageController::class, 'index'])->name('index');
        Route::post('/', [MessageController::class, 'store'])->name('store');
        Route::get('/detail/{slug}', [MessageController::class, 'show'])->name('show');
        Route::post('/reply/{slug}', [MessageController::class, 'reply'])->name('reply');
    });

    // Admin
    Route::name('admin.')->middleware('role:admin')->group(function () {
        // Admin
        Route::get('/settings', [AdminSettingController::class, 'index'])->name('settings');
        Route::post('/settings', [AdminSettingController::class, 'update'])->name('settings.update');

        // Kelas
        Route::prefix('class')->name('class.')->group(function () {
            Route::get('/', [AdminClassController::class, 'index'])->name('index');
            Route::get('/detail/{id}', [AdminClassController::class, 'detail'])->name('detail');
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
            Route::delete('/delete/{id}', [AdminStudentController::class, 'delete'])->name('delete');
            Route::post('/import', [AdminStudentController::class, 'import'])->name('import');
            Route::get('/export', [AdminStudentController::class, 'export'])->name('export');
            Route::delete('/delete-all', [AdminStudentController::class, 'deleteAll'])->name('delete-all');
            Route::post('/delete-by-class', [AdminStudentController::class, 'deleteByClass'])->name('delete-by-class');
        });

        // Guru
        Route::prefix('teacher')->name('teacher.')->group(function () {
            Route::get('/', [AdminTeacherController::class, 'index'])->name('index');
            Route::get('/create', [AdminTeacherController::class, 'create'])->name('create');
            Route::post('/create', [AdminTeacherController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [AdminTeacherController::class, 'edit'])->name('edit');
            Route::post('/edit/{id}', [AdminTeacherController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [AdminTeacherController::class, 'delete'])->name('delete');
            Route::post('/import', [AdminTeacherController::class, 'import'])->name('import');
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
        Route::prefix('schedules')->name('schedule.')->group(function () {
            Route::get('/', [AdminScheduleController::class, 'index'])->name('index');
            Route::get('/create', [AdminScheduleController::class, 'create'])->name('create');
            Route::post('/create', [AdminScheduleController::class, 'store'])->name('store');
        });

        // Tugas Harian
        Route::prefix('daily-task')->name('dailytask.')->group(function () {
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
            Route::put('{id}', [AdminNewsController::class, 'update'])->name('update');
            Route::delete('{id}', [AdminNewsController::class, 'delete'])->name('delete');
        });

        Route::prefix('category')->name('category.')->group(function () {
            Route::get('/', [AdminCategoryController::class, 'index'])->name('index');
            Route::post('/', [AdminCategoryController::class, 'store'])->name('store');
            Route::put('{id}', [AdminCategoryController::class, 'update'])->name('update');
            Route::delete('{id}', [AdminCategoryController::class, 'delete'])->name('delete');
        });
    });

    // Guru
    Route::name('teacher.')->middleware('role:guru')->group(function () {
        // Kelas Saya
        Route::prefix('my-class')->name('myclass.')->group(function () {
            Route::get('/', [TeacherMyClassController::class, 'index'])->name('index');
            Route::get('/presence-history', [TeacherMyClassController::class, 'presenceHistory'])->name('presenceHistory');
        });

        // Jurusan Saya
        Route::prefix('my-department')->name('mydepartment.')->group(function () {
            Route::get('/', [TeacherMyDepartmentController::class, 'index'])->name('index');
        });

        // Jadwal Mengajar
        Route::prefix('schedule')->name('schedule.')->group(function () {
            Route::get('/', [TeacherScheduleController::class, 'index'])->name('index');
            Route::get('/{id}/absen', [TeacherScheduleController::class, 'absen'])->name('absen');
            Route::post('/{id}/absen', [TeacherScheduleController::class, 'storeAbsen'])->name('storeAbsen');
        });
    });

    // Siswa

    // Ortu

    // Postingan Forum
    Route::prefix('posts')->name('posts.')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::post('/', [PostController::class, 'store'])->name('store');
        Route::get('{id}/approved', [PostController::class, 'approved'])->name('approved');
        Route::get('{id}/disapproved', [PostController::class, 'disapproved'])->name('disapproved');
        Route::put('{id}', [PostController::class, 'update'])->name('update');
        Route::delete('{id}', [PostController::class, 'delete'])->name('delete');
    });
});
