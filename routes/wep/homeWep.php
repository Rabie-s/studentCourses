<?php
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\Auth\AuthController;


Route::get('/',HomeController::class)->name('user.home');
