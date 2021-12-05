<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminProfileCreateRequest;
use App\Http\Requests\AdminProfileUpdateRequest;
use App\Models\AdminProfile;
use Illuminate\Support\Str;

class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminProfiles = AdminProfile::paginate(15);

        return $adminProfiles;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AdminProfileCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminProfileCreateRequest $request)
    {
        $data = $request->validate();

        $adminProfile = AdminProfile::create([
            'uuid'      => (string) Str::uuid(),
            'nikname'   => $data['nikname'],
            'phone'     => $data['phone'],
        ]);

        $adminProfile->save();

        return $adminProfile;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminProfile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(AdminProfile $adminProfile)
    {
        $adminProfile = AdminProfile::find($adminProfile);

        return $adminProfile;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AdminProfileUpdateRequest  $request
     * @param  \App\Models\AdminProfile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(AdminProfileUpdateRequest $request, AdminProfile $adminProfile)
    {
        $data = $request->validate();

        $adminProfile = AdminProfile::find($adminProfile);

        $adminProfile->uuid = (string) Str::uuid();
        $adminProfile->nickname = $data['nickname'];
        $adminProfile->phone = $data['phone'];

        $adminProfile->save();

        return $adminProfile;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminProfile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminProfile $adminProfile)
    {
        $adminProfile = AdminProfile::find($adminProfile);

        return $adminProfile->delete();
    }
}
