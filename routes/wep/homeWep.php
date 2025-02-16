<?php
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\AuthController;


Route::get('/',function(){
    return Inertia::render('User/Home/Index');
})->name('user.home');
