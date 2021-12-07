<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Services\UserManagmentService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
	/**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserRegisterRequest  $request
     * @return \Illuminate\Http\Response
     */
    protected function register(UserRegisterRequest $request, UserManagmentService $manager)
    {
		$user = $manager->createUser($request);

        $accessToken = $user->createToken('accessToken')->plainTextToken;

        $response = ['user' => $user, 'accessToken' => $accessToken];

        return response($response, 201);
    }



}
