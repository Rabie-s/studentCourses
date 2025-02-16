<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CourseController;


Route::get('courses',[CourseController::class,'index'])->name('user.course.index');
Route::get('courses/category/{id}',[CourseController::class,'showCoursesByCategories'])->name('user.course.showCoursesByCategories');