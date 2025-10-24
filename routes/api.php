<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::controller(RegisterController::class)->group(function() {
    Route::post('/register', 'registerFunction');
    Route::post('/login', 'loginFunction');
});