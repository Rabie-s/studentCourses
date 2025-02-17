<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
/* Route::get('/', function () {
    return view('welcome');
}); */

Route::group(['middleware' => ['auth:user']], function () {
    require __DIR__ . '/wep/checkoutWep.php';
});

require __DIR__ . '/wep/homeWep.php';
require __DIR__ . '/wep/userAuth.php';
require __DIR__ . '/wep/courseWep.php';



//admin routes
Route::prefix('admin')->group(function(){
    require __DIR__ . '/wep/admin/adminAuth.php';
    require __DIR__ . '/wep/admin/dashboardWep.php';
    require __DIR__ . '/wep/admin/userWep.php';
    require __DIR__ . '/wep/admin/courseWep.php';
    require __DIR__ . '/wep/admin/categoryWep.php';
});



/* Route::get('/', function () {
    return Inertia::render('Home');
}); */

Route::get('/about', function () {
    return Inertia::render('About');
})->name('about');
