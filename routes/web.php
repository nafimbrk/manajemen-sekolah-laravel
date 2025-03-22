<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\ExtracurricularStudentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Event\ViewEvent;



Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticating'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/students', [StudentController::class, 'index'])->middleware('auth');
Route::get('/student/{id}', [StudentController::class, 'show'])->middleware(['auth', 'must-admin-or-teacher']);
Route::get('/student-add', [StudentController::class, 'create'])->middleware(['auth', 'must-admin-or-teacher']);
Route::post('/student', [StudentController::class, 'store'])->middleware(['auth', 'must-admin-or-teacher']);
Route::get('/student-edit/{id}', [StudentController::class, 'edit'])->middleware(['auth', 'must-admin-or-teacher']);
Route::put('/student/{id}', [StudentController::class, 'update'])->middleware(['auth', 'must-admin-or-teacher']);
Route::delete('/student-destroy/{id}', [StudentController::class, 'destroy'])->middleware(['auth', 'must-admin']);
Route::get('/student-deleted', [StudentController::class, 'deletedStudent'])->middleware(['auth', 'must-admin']);
Route::get('/student/{id}/restore', [StudentController::class, 'restore'])->middleware(['auth', 'must-admin']);

Route::get('/class', [ClassController::class, 'index'])->middleware('auth');
Route::get('/class-detail/{id}', [ClassController::class, 'show'])->middleware('auth');
Route::get('/class/create', [ClassController::class, 'create'])->middleware('auth')->name('class.create');
Route::post('/class/store', [ClassController::class, 'store'])->middleware('auth')->name('class.store');
Route::get('/class/edit/{id}', [ClassController::class, 'edit'])->middleware('auth')->name('class.edit');
Route::put('/class/update/{id}', [ClassController::class, 'update'])->middleware('auth')->name('class.update');
Route::delete('/class/destroy/{id}', [ClassController::class, 'destroy'])->middleware('auth')->name('class.destroy');


Route::get('/teacher', [TeacherController::class, 'index'])->middleware('auth');
Route::get('/teacher-detail/{id}', [TeacherController::class, 'show'])->middleware('auth');
Route::get('/teacher/create', [TeacherController::class, 'create'])->middleware('auth')->name('teacher.create');
Route::post('/teacher/store', [TeacherController::class, 'store'])->middleware('auth')->name('teacher.store');
Route::get('/teacher/edit/{id}', [TeacherController::class, 'edit'])->middleware('auth')->name('teacher.edit');
Route::put('/teacher/update/{id}', [TeacherController::class, 'update'])->middleware('auth')->name('teacher.update');
Route::delete('/teacher/destroy/{id}', [TeacherController::class, 'destroy'])->middleware('auth')->name('teacher.destroy');

Route::get('/extracurricular', [ExtracurricularController::class, 'index'])->middleware('auth');
Route::get('/extracurricular-detail/{id}', [ExtracurricularController::class, 'show'])->middleware('auth');
Route::get('/extracurricular/create', [ExtracurricularController::class, 'create'])->middleware('auth')->name('ekskul.create');
Route::post('/extracurricular/store', [ExtracurricularController::class, 'store'])->middleware('auth')->name('ekskul.store');
Route::get('/extracurricular/edit/{id}', [ExtracurricularController::class, 'edit'])->middleware('auth')->name('ekskul.edit');
Route::put('/extracurricular/update/{id}', [ExtracurricularController::class, 'update'])->middleware('auth')->name('ekskul.update');
Route::delete('/extracurricular/destroy/{id}', [ExtracurricularController::class, 'destroy'])->middleware('auth')->name('ekskul.destroy');

Route::get('/extracurricular/student', [ExtracurricularStudentController::class, 'index'])->middleware('auth')->name('ekskul.student.index');
Route::get('/extracurricular/student/create', [ExtracurricularStudentController::class, 'create'])->middleware('auth')->name('ekskul.student.create');
Route::post('/extracurricular/student/store', [ExtracurricularStudentController::class, 'store'])->middleware('auth')->name('ekskul.student.store');
Route::get('/extracurricular/student/edit', [ExtracurricularStudentController::class, 'edit'])->middleware('auth')->name('ekskul.student.edit');
Route::put('/extracurricular/student/update', [ExtracurricularStudentController::class, 'update'])->middleware('auth')->name('ekskul.student.update');
Route::delete('/extracurricular/student/destroy', [ExtracurricularStudentController::class, 'destroy'])->middleware('auth')->name('ekskul.student.destroy');
