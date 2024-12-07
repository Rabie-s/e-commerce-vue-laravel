<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CartController;

Route::get('cart/addToCart',[CartController::class,'addToCart']);
Route::get('cart/cart',[CartController::class,'index']);

