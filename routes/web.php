<?php

use App\Http\Controllers\InstructorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/instructors', InstructorController::class)->only(['index', 'store']);