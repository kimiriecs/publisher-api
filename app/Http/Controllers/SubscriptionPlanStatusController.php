<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusCreateRequest;
use App\Http\Requests\StatusUpdateRequest;
use App\Models\SubscriptionPlanStatus;

class SubscriptionPlanStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptionPlanStatus = SubscriptionPlanStatus::all();

        return $subscriptionPlanStatus;
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

        $subscriptionPlanStatus = SubscriptionPlanStatus::create([
          'name' => $data['name'],
          'description' => $data['description'],
        ]);

        $subscriptionPlanStatus->save();

        return $subscriptionPlanStatus;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubscriptionPlanStatus  $subscriptionPlanStatus
     * @return \Illuminate\Http\Response
     */
    public function show(SubscriptionPlanStatus $subscriptionPlanStatus)
    {
        $subscriptionPlanStatus = SubscriptionPlanStatus::find($subscriptionPlanStatus);

        return $subscriptionPlanStatus;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StatusUpdateRequest  $request
     * @param  \App\Models\SubscriptionPlanStatus  $subscriptionPlanStatus
     * @return \Illuminate\Http\Response
     */
    public function update(StatusUpdateRequest $request, SubscriptionPlanStatus $subscriptionPlanStatus)
    {
        $data = $request->validated();

        $subscriptionPlanStatus = SubscriptionPlanStatus::find($subscriptionPlanStatus);

        $subscriptionPlanStatus->name = $data['name'];
        $subscriptionPlanStatus->description = $data['description'];

        $subscriptionPlanStatus->save();

        return $subscriptionPlanStatus;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubscriptionPlanStatus  $subscriptionPlanStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubscriptionPlanStatus $subscriptionPlanStatus)
    {
        $subscriptionPlanStatus = SubscriptionPlanStatus::find($subscriptionPlanStatus);

        return $subscriptionPlanStatus->delete();
    }
}
