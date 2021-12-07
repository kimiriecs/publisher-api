<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    protected function register(UserRegisterRequest $request)
    {
        $input = $request->validated();
        $user = User::create([
          'name' => $input['name'],
          'email' => $input['email'],
          'password' => Hash::make($input['password']),
        ]);

        $accessToken = $user->createToken('accessToken')->plainTextToken;

        $response = ['user' => $user, 'accessToken' => $accessToken];

        return response($response, 201);
    }
}
