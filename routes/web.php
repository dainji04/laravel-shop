<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\admin\adminController;
use \App\Http\Controllers\admin\loginController;
use \App\Http\Controllers\admin\signUpController;
use function Pest\Laravel\post;

Route::get('/login', [loginController::class, 'index']);
Route::post('/auth/login/store', [loginController::class, 'auth']);

Route::get('/sign-up', [signUpController::class, 'index']);
Route::post('/auth/register', [signUpController::class, 'register']);
Route::get('/', [adminController::class, 'index']);
