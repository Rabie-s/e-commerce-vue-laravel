<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CartController;

Route::get('cart',[CartController::class,'index'])->name('cart.index');
Route::post('cart/addToCart',[CartController::class,'addToCart'])->name('cart.addToCart');
Route::put('cart/updateItem',[CartController::class,'updateItem'])->name('cart.updateItem');
Route::delete('cart/removeItem',[CartController::class,'removeItem'])->name('cart.removeItem');
Route::delete('cart/destroyCart',[CartController::class,'destroyCart'])->name('cart.destroyCart');


