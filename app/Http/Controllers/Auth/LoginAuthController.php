<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Controller;
use Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAuthController extends BaseController
{
    public function index(Request $request)
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            // Buat token Sanctum
            $token = $user->createToken('MyApp')->plainTextToken;

            session([
                'token' => $token,
                'user_name' => $user->name,
            ]);

            return redirect()->route('dashboard')->with('success', 'Login berhasil');
        }

        return back()->withErrors(['login_error' => 'Email atau password salah.']);
    }
}
