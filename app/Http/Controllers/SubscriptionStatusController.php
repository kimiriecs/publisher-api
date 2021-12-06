<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusCreateRequest;
use App\Http\Requests\StatusUpdateRequest;
use App\Models\SubscriptionStatus;
use Illuminate\Http\Request;

class SubscriptionStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptionStatus = SubscriptionStatus::all();

        return $subscriptionStatus;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StatusCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatusCreateRequest $request)
    {
        $data = $request->validatedd();

        $subscriptionStatus = SubscriptionStatus::create([
          'name' => $data['name'],
          'description' => $data['description'],
        ]);

        $subscriptionStatus->save();

        return $subscriptionStatus;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubscriptionStatus  $subscriptionStatus
     * @return \Illuminate\Http\Response
     */
    public function show(SubscriptionStatus $subscriptionStatus)
    {
        $subscriptionStatus = SubscriptionStatus::find($subscriptionStatus->id);

        return $subscriptionStatus;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StatusUpdateRequest  $request
     * @param  \App\Models\SubscriptionStatus  $subscriptionStatus
     * @return \Illuminate\Http\Response
     */
    public function update(StatusUpdateRequest $request, SubscriptionStatus $subscriptionStatus)
    {
        $data = $request->validatedd();

        $subscriptionStatus = SubscriptionStatus::find($subscriptionStatus->id);

        $subscriptionStatus->name = $data['name'];
        $subscriptionStatus->description = $data['description'];

        $subscriptionStatus->save();

        return $subscriptionStatus;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubscriptionStatus  $subscriptionStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubscriptionStatus $subscriptionStatus)
    {
        $subscriptionStatus = SubscriptionStatus::find($subscriptionStatus->id);

        $subscriptionStatus->delete();
        
        return  response('resource updated successfully', 200);
    }
}
