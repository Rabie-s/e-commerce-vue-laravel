<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;


//route should be user login
Route::group(['middleware' => ['auth:user']], function () {
    require __DIR__ . '/wep/checkoutWep.php';
    require __DIR__ . '/wep/profileWep.php';
});
require __DIR__ . '/wep/userAuth.php';
////////////////////////////////////
require __DIR__ . '/wep/productWep.php';
require __DIR__ . '/wep/cartWep.php';
require __DIR__ . '/wep/homeWep.php';



//admin routes
//Route::group(['prefix'=>'admin','middleware'=>['auth:admin']],function(){});
Route::prefix('admin')->group(function () {
    require __DIR__ . '/wep/admin/adminAuth.php';
    Route::middleware('auth:admin')->group(function(){

        require __DIR__ . '/wep/admin/dashboardWep.php';
        require __DIR__ . '/wep/admin/adminWep.php';
        require __DIR__ . '/wep/admin/userWep.php';
        require __DIR__ . '/wep/admin/categoryWep.php';
        require __DIR__ . '/wep/admin/productWep.php';
        require __DIR__ . '/wep/admin/orderWep.php';
    });

});




Route::get('test', function () {
    return Inertia::render('Test');
});
