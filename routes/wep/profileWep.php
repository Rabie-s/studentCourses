<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProfileController;


Route::get('user/profile',[ProfileController::class,'index'])->name('user.profile.index');//userEnrollments
Route::get('user/profile/enrollments',[ProfileController::class,'userEnrollments'])->name('user.profile.userEnrollments');//userEnrollments
Route::get('user/profile/userAddress',[ProfileController::class,'userAddress'])->name('user.profile.userAddress');//userEnrollments
