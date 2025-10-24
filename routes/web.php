<?php

use App\Http\Controllers\Auth\LoginAuthController;
use App\Http\Controllers\Auth\RegisterAuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route::post('tokens/create', function (Request $request){
//     $token = $request->user()->createToken($request->token_name);

//     return ['token' => $token->plainTextToken];
// });

Route::prefix('auth')->group(function () {
    Route::get('/login', [LoginAuthController::class, 'index'])->name('login');
    Route::post('/login', [LoginAuthController::class, 'login'])->name('login.submit');
    Route::get('/register', [RegisterAuthController::class, 'index'])->name('register');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
