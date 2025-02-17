<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthController;

Route::get('login', [AuthController::class, 'showLoginForm'])->name('admin.auth.showLoginForm');
Route::post('loginAdmin', [AuthController::class, 'loginAdmin'])->name('admin.auth.loginAdmin');
Route::post('logoutAdmin', [AuthController::class, 'logoutAdmin'])->name('admin.auth.logoutAdmin');
