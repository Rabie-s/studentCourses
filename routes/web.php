<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
/* Route::get('/', function () {
    return view('welcome');
}); */

require __DIR__ . '/wep/homeWep.php';
require __DIR__ . '/wep/userAuth.php';
require __DIR__ . '/wep/courseWep.php';


/* Route::get('/', function () {
    return Inertia::render('Home');
}); */

Route::get('/about', function () {
    return Inertia::render('About');
})->name('about');
