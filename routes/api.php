<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::controller(AuthController::class)->group(function() {
    Route::post('/register', 'registerFunction');
    Route::post('/login', 'loginFunction');
});

Route::post('/logout', [AuthController::class, 'logoutFunction'])->middleware('auth:api');


