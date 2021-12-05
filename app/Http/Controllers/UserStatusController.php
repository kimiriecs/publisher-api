<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusCreateRequest;
use App\Http\Requests\StatusUpdateRequest;
use App\Models\UserStatus;

class UserStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userStatus = UserStatus::all();

        return $userStatus;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StatusCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatusCreateRequest $request)
    {
        $data = $request->validated();

        $userStatus = UserStatus::create([
          'name' => $data['name'],
          'description' => $data['description'],
        ]);

        $userStatus->save();

        return $userStatus;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserStatus  $userStatus
     * @return \Illuminate\Http\Response
     */
    public function show(UserStatus $userStatus)
    {
        $userStatus = UserStatus::find($userStatus);

        return $userStatus;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StatusUpdateRequest  $request
     * @param  \App\Models\UserStatus  $userStatus
     * @return \Illuminate\Http\Response
     */
    public function update(StatusUpdateRequest $request, UserStatus $userStatus)
    {
        $data = $request->validated();

        $userStatus = UserStatus::find($userStatus);

        $userStatus->name = $data['name'];
        $userStatus->description = $data['description'];

        $userStatus->save();

        return $userStatus;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserStatus  $userStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserStatus $userStatus)
    {
        $userStatus = UserStatus::find($userStatus);

        return $userStatus->delete();
    }
}
