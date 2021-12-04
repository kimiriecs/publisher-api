<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionPlanCreateRequest;
use App\Http\Requests\SubscriptionPlanUpdateRequest;
use App\Models\SubscriptionPlan;
use App\Models\SubscriptionPlanStatus;

class SubscriptionPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptionPlans = SubscriptionPlan::paginate(10);

        return $subscriptionPlans;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SubscriptionPlanCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubscriptionPlanCreateRequest $request)
    {
        $data = $request->validated();

        $subscriptionPlan = SubscriptionPlan::create([
            'name'                          => $data['name'],
            'price'                         => $data['price'],
            'posts_total_count'             => $data['posts_total_count'],
            'subscription_period'           => $data['subscription_period'],
            'subscription_plan_status_id'   => SubscriptionPlanStatus::where('name', 'locked')->first('id')->id,
        ]);
        
        $subscriptionPlan->save();

        return $subscriptionPlan;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubscriptionPlan  $subscriptionPlan
     * @return \Illuminate\Http\Response
     */
    public function show(SubscriptionPlan $subscriptionPlan)
    {
        $subscriptionPlan = SubscriptionPlan::find($subscriptionPlan);

        return $subscriptionPlan;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\SubscriptionPlanUpdateRequest  $request
     * @param  \App\Models\SubscriptionPlan  $subscriptionPlan
     * @return \Illuminate\Http\Response
     */
    public function update(SubscriptionPlanUpdateRequest $request, SubscriptionPlan $subscriptionPlan)
    {
        $data = $request->validated();

        $subscriptionPlan = SubscriptionPlan::create([
            'name'                          => $data['name'],
            'price'                         => $data['price'],
            'posts_total_count'             => $data['posts_total_count'],
            'subscription_period'           => $data['subscription_period'],
            'subscription_plan_status_id'   => $data['subscription_plan_status_id'],
        ]);
        
        $subscriptionPlan->save();

        return $subscriptionPlan;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\SubscriptionPlanUpdateRequest  $request
     * @param  \App\Models\SubscriptionPlan  $subscriptionPlan
     * @return \Illuminate\Http\Response
     */
    public function updateSubscriptionPlanStatus(SubscriptionPlanUpdateRequest $request, SubscriptionPlan $subscriptionPlan)
    {
        $data = $request->validated();

        $subscriptionPlan->subscription_plan_status_id = $data['subscription_plan_status_id'];
        
        $subscriptionPlan->save();

        return $subscriptionPlan;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubscriptionPlan  $subscriptionPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubscriptionPlan $subscriptionPlan)
    {
        $subscriptionPlan = SubscriptionPlan::find($subscriptionPlan);
        
        return $subscriptionPlan->delete();
    }
}
