<?php
use Inertia\Inertia;

use Illuminate\Support\Facades\Route;

require __DIR__.'/wep/userAuth.php';
require __DIR__.'/wep/productWep.php';
require __DIR__.'/wep/cartWep.php';

Route::get('admin/test',function(){
    return Inertia::render('Admin/Test');
});