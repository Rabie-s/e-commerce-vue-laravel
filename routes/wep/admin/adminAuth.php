<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthController;

Route::get('login', [AuthController::class, 'showLoginForm'])->name('admin.auth.showLoginForm')->middleware('guest:admin');

Route::post('loginAdmin', [AuthController::class, 'loginAdmin'])->name('admin.auth.loginAdmin')->middleware('guest:admin');

Route::post('logoutAdmin', [AuthController::class, 'logoutAdmin'])->name('admin.auth.logoutAdmin')->middleware('auth:admin');

