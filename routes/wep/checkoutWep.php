<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CheckoutController;


Route::get('checkout',[CheckoutController::class,'index'])->name('checkout.index');
Route::post('placeOrder',[CheckoutController::class,'placeOrder'])->name('checkout.placeOrder');