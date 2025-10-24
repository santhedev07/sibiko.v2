<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class RegisterController extends BaseController
{
    public function registerFunction(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
            'c_password' => ['required', 'same:password'],
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $success['name'] =  $user->name;


        return $this->sendResponses($success, 'User registered successfully.');
    }

    public function loginFunction(Request $request): JsonResponse 
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['name'] =  $user->name;

            return $this->sendResponses($success, 'User logged in successfully.');
        }else{
            return $this->sendError('Error', ['error' => 'Invalid Credentials']);
        }
    }
}
