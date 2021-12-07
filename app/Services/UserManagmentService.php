<?php

namespace App\Services;

use App\Http\Requests\UserRegisterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\UserProfile;
use App\Models\User;

class UserManagmentService
{
	/**
     * Call to create new user, then return just created user
     *
     * @param  \App\Http\Requests\UserRegisterRequest  $request
     * @return \Illuminate\Http\Response
     */
	public function createUser(UserRegisterRequest $request)
	{
		$user = $this->makeUser($request);

		return $user;
	}


	/**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserRegisterRequest  $request
     * @return \Illuminate\Http\Response
     */
    private function makeUser(UserRegisterRequest $request)
    {
		$data = $request->validated();

		$userNikname = array_key_exists('nikname', $data) && isset($data['nikname']) 
						? $data['nikname'] 
						: $data['first_name'] . '&#64;' . $data['last_name'];

		$userPhone = array_key_exists('phone', $data) && isset($data['phone']) 
						? $data['phone'] : 'no phone';

		$userProfileData = [
			'nikname' => $userNikname,
			'phone' => $userPhone,
		];

		$userProfile = $this->makeProfile($userProfileData);

		$user = User::create([
			'first_name' => $data['first_name'],
			'last_name' => $data['last_name'],
			'email' => $data['email'],
			'password' => Hash::make($data['password']),
			'profile_id' => $userProfile->id,
			'profile_type' => 'user-profile',
		]);

		return $user;
    }

	/**
     * Store a newly created resource in storage.
     * @param array $profileData
     * @return \Illuminate\Http\Response
     */
    private function makeProfile(array $profileData)
    {
        $data = $profileData;

        $profile = UserProfile::create([
            'uuid'      => (string) Str::uuid(),
            'nikname'   => $data['nikname'],
            'phone'     => $data['phone'], 
        ]);

        return $profile;
    }

}