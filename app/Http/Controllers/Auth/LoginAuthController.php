<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginAuthController extends BaseController
{
    public function index(Request $request){
        return view('auth.login');
    }

}
