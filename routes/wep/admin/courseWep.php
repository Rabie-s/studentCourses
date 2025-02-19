<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CourseController;

Route::resource('courses',CourseController::class)->names('admin.courses');