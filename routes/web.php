<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
/* Route::get('/', function () {
    return view('welcome');
}); */

Route::group(['middleware' => ['auth:user']], function () {
    require __DIR__ . '/wep/checkoutWep.php';
    require __DIR__ . '/wep/profileWep.php';
});

require __DIR__ . '/wep/homeWep.php';
require __DIR__ . '/wep/userAuth.php';
require __DIR__ . '/wep/courseWep.php';



//admin routes
Route::prefix('admin')->group(function () {
    require __DIR__ . '/wep/admin/adminAuth.php';
    Route::middleware('auth:admin')->group(function(){
        require __DIR__ . '/wep/admin/dashboardWep.php';
        require __DIR__ . '/wep/admin/userWep.php';
        require __DIR__ . '/wep/admin/courseWep.php';
        require __DIR__ . '/wep/admin/categoryWep.php';
        require __DIR__ . '/wep/admin/enrollmentWep.php';
    });


});



Route::get('/test', function () {
    return Inertia::render('Test');
}); 
