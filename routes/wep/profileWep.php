<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProfileController;


Route::get('user/profile', [ProfileController::class, 'index'])->name('user.profile.index');
Route::get('user/shippingAddress', [ProfileController::class, 'shippingAddress'])->name('user.profile.shippingAddress');
Route::get('user/orders', [ProfileController::class, 'orders'])->name('user.profile.orders');
Route::post('user/insertShippingAddress', [ProfileController::class, 'insertShippingAddress'])->name('user.profile.insertShippingAddress');
Route::get('user/order/orderDetails/{orderId}', [ProfileController::class, 'orderDetails'])->name('user.profile.orderDetails');
