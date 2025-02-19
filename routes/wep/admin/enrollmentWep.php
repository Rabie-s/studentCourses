<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EnrollmentController;

//Route::resource('enrollments',EnrollmentController::class)->except(['store,create'])->names('admin.enrollments');
Route::resource('enrollments', EnrollmentController::class)
    ->except(['store', 'create'])
    ->names('admin.enrollments');
