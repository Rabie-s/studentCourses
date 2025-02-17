<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CheckoutController;

Route::get('checkout/{id}',[CheckoutController::class,'index'])->name('checkout.index');
Route::post('checkout/enrollmentCheckout',[CheckoutController::class,'enrollmentCheckout'])->name('checkout.enrollmentCheckout');