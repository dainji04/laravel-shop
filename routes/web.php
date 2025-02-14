<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\admin\adminController;
use \App\Http\Controllers\admin\loginController;
use \App\Http\Controllers\admin\signUpController;
use App\Http\Controllers\admin\logoutController;
use App\Http\Middleware\CheckSessionTimeout;

Route::get('/login', [loginController::class, 'index'])->name('login');

Route::post('/auth/login/store', [loginController::class, 'auth']);

Route::get('/sign-up', [signUpController::class, 'index']);

Route::post('/logout', [logoutController::class, 'index'])->name('logout');

Route::post('/auth/register', [signUpController::class, 'register']);

Route::middleware(['auth', CheckSessionTimeout::class])->group(function () {
    Route::get('/about', function () {
        return view('about');
    })->name('about');

    Route::get('/', [adminController::class, 'index'])->middleware(['auth', CheckSessionTimeout::class])->name('home');

    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');
});
