<?php
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\AuthController;

Route::get('register',[AuthController::class,'showRegistrationForm'])->name('user.auth.showRegistrationForm');
Route::get('login',[AuthController::class,'showLoginForm'])->name('user.auth.showLoginForm');
Route::post('registerUser',[AuthController::class,'registerUser'])->name('user.auth.registerUser');
Route::post('loginUser',[AuthController::class,'loginUser'])->name('user.auth.loginUser');
Route::post('logoutUser',[AuthController::class,'logoutUser'])->name('user.auth.logoutUser');

/* Route::get('/',function(){
    return Inertia::render('Welcome');
})->name('welcome');
 */