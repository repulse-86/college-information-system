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