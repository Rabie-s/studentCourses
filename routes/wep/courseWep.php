<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CourseController;

Route::resource('courses',CourseController::class);
