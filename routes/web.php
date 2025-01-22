<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\LeraarDashboardController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseOverviewController;


Route::get('/', function () {
    return view('index');
});

// registratie
Route::get('/registration', [RegistrationController::class, 'index'])->name('registration.index');
Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.store');

// login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//dashboards
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('adashboard');
    Route::get('/leraar/dashboard', [LeraarDashboardController::class, 'index'])->name('ldashboard');
    Route::get('/student/dashboard', [StudentDashboardController::class, 'index'])->name('sdashboard');
});


Route::get('/leraar/dashboard', [LeraarDashboardController::class, 'index'])->name('ldashboard');
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::post('/courses/store', [CourseController::class, 'store'])->name('courses.store');
Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
Route::put('/courses/{course}', [CourseController::class, 'update'])->name('courses.update');
Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');


//overzichten
Route::get('/studenten', [UserController::class, 'studentenOverzicht'])->name('studenten.index');
Route::get('/courses', [CourseOverviewController::class, 'index'])->name('courses.index');

//studenten aanmelden aan lessen
Route::post('/courses/{course}/enroll', [CourseController::class, 'enroll'])->name('courses.enroll');

Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');

Route::put('/courses/{course}/update-students', [CourseController::class, 'updateStudents'])->name('courses.updateStudents');
