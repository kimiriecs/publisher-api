<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(UserLoginRequest $request)
    {

        $login = $request->input();

        if( !Auth::attempt( $login ) ) {

            $response = ['message' => 'Invalid login creadentials'];

            return response($response, 401);
        }

        $accessToken = Auth::user()->createToken('accessToken')->plainTextToken;

        $response = ['user' => Auth::user(), 'accessToken' => $accessToken];

        return response($response, 200);

    }

    public function logout()
    {
        Auth::user()->tokens()->delete();

        return response(['message' => 'You are logged out successfully'], 200);
    }
}
