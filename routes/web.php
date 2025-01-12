<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureCartIsNotEmpty;

Route::group(['middleware'=>['auth',EnsureCartIsNotEmpty::class]],function(){
    require __DIR__ . '/wep/checkoutWep.php';
});

require __DIR__ . '/wep/userAuth.php';
require __DIR__ . '/wep/productWep.php';
require __DIR__ . '/wep/cartWep.php';
require __DIR__ . '/wep/profileWep.php';
require __DIR__ . '/wep/homeWep.php';

Route::get('admin/test', function () {
    return Inertia::render('Admin/Test');
});

Route::get('test', function () {
    return Inertia::render('Test');
});

