<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserProfileUpdateRequest;
use App\Http\Requests\UserProfileCreateRequest;
use App\Models\UserProfile;
use Illuminate\Support\Str;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userProfiles = UserProfile::paginate(15);

        return $userProfiles;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function show(UserProfile $userProfile)
    {
        $userProfile = UserProfile::find($userProfile->id);

        return $userProfile;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserProfileUpdateRequest  $request
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function update(UserProfileUpdateRequest $request, UserProfile $userProfile)
    {
        $data = $request->validated();

        $userProfile = UserProfile::find($userProfile->id);

        $userProfile->uuid = (string) Str::uuid();
        $userProfile->nikname = $data['nikname'];
        $userProfile->phone = $data['phone'];

        $userProfile->save();

        return $userProfile;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserProfile $userProfile)
    {
        $userProfile = UserProfile::find($userProfile->id);

        $userProfile->delete();

        return response('resource updated successfully', 200);
    }
}
