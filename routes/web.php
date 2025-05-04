<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [InstructorController::class, 'index']);

Route::resource('/instructors', InstructorController::class)->only(['index', 'store']);
Route::resource('/departments', DepartmentController::class)->only(['index', 'store']);
Route::resource('/courses', CourseController::class)->only(['index', 'store']);
Route::resource('/students', StudentController::class)->only(['index', 'store']);

Route::get('/assign-course/student/{student}', [StudentController::class, 'assignWithCourse'])->name('students.assign.course');
Route::post('/assign-course/student/{student}', [StudentController::class, 'assignWithCourseStore'])->name('students.assign.course.store');