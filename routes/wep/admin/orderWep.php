<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OrderController;

Route::put('orders/updateOrderStatus/{orderId}',[OrderController::class,'updateOrderStatus'])->name('orders.updateOrderStatus');
Route::put('orders/updatePaymentStatus/{orderId}',[OrderController::class,'updatePaymentStatus'])->name('orders.updatePaymentStatus');
Route::resource('orders',OrderController::class);