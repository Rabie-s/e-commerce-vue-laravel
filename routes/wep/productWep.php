<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProductController;

Route::get('products/category/{id}',[ProductController::class,'showProductsByCategories'])->name('products.showProductsByCategories');
Route::resource('products',ProductController::class)->only(['index','show']);