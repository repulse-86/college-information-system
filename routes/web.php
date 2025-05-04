<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\InstructorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/instructors', InstructorController::class)->only(['index', 'store']);
Route::resource('/departments', DepartmentController::class)->only(['index', 'store']);
Route::resource('/courses', CourseController::class)->only(['index', 'store']);