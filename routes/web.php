<?php

use App\Http\Controllers\Auth\LoginAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route::post('tokens/create', function (Request $request){
//     $token = $request->user()->createToken($request->token_name);

//     return ['token' => $token->plainTextToken];
// });

Route::prefix('auth')->group(function () {
    Route::get('/login', [LoginAuthController::class, 'index']);

});