<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SubscriptionCreateRequest;
use App\Http\Requests\SubscriptionUpdateRequest;
use App\Models\SubscriptionStatus;
use App\Models\Subscription;
use App\Models\User;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptions = Subscription::paginate(10);

        return $subscriptions;
    }


    /**
     * Display a listing of the CONCRETE user's subscriptions
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function userSubscriptions(User $user)
    {
        $subscriptions = Subscription::where('user_id', $user->id)->paginate(10);

        return $subscriptions;
    }


    /**
     * Display a listing of the currently authenticated user's subscriptions
     *
     * @return \Illuminate\Http\Response
     */
    public function currentUserSubscriptions()
    {
        $user = Auth::user();
        
        $subscriptions = Subscription::where('user_id', $user->id)->paginate(10);

        return $subscriptions;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SubscriptionCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store($subscription_id, SubscriptionCreateRequest $request)
    {
        $data = $request->validated();

        $subscription = Subscription::create([

            'encryption'                => rand(1000000000, 9999999999),
            'posts_total_count'         => Subscription::find($subscription_id)->plan->posts_total_count,
            'posts_used_count'          => null,
            'remains'                   => null,
            'started_at'                => now()->timestamp,
            'finished_at'               => now()->timestamp + Subscription::find($subscription_id)->plan->subscription_period,
            'user_id'                   => Auth::user()->id,
            'subscription_plan_id'      => Subscription::find($subscription_id)->plan->id,
            'subscription_status_id'    => SubscriptionStatus::where('name', 'unpaid')->first('id')->id,

        ]);

        $subscription->save();

        return $subscription;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        $subscription = Subscription::find($subscription->id);

        return $subscription;
    }


    /**
     * Display subscriptions of CONCRETE user
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function userSubscriptionsShow(User $user)
    {
        $subscriptions = Subscription::where('user_id', $user->id)->get();

        return $subscriptions;
    }


    /**
     * Display subscriptions of currently authenticated user
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function currentUserSubscriptionsShow(Subscription $subscription)
    {
        $user = Auth::user();

        $subscriptions = Subscription::where('user_id', $user->id)->get();

        return $subscriptions;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\SubscriptionUpdateRequest  $request
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(SubscriptionUpdateRequest $request, Subscription $subscription)
    {
        $data = $request->validated();

        $subscription = Subscription::find($subscription->id);

        $subscription->encryption = $data['encryption'];
        $subscription->posts_total_count = $data['posts_total_count'];
        $subscription->posts_used_count = $data['posts_used_count'];
        $subscription->started_at = $data['started_at'];
        $subscription->finished_at = $data['finished_at'];
        $subscription->user_id = $data['user_id'];
        $subscription->subscription_plan_id = $data['subscription_plan_id'];
        $subscription->subscription_status_id = $data['subscription_status_id'];

        $subscription->save();

        return $subscription;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\SubscriptionUpdateRequest  $request
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function updateSubscriptionStatus(SubscriptionUpdateRequest $request, Subscription $subscription)
    {
        $data = $request->validated();

        $subscription = Subscription::find($subscription->id);

        $subscription->subscription_status_id = $data['subscription_status_id'];

        $subscription->save();

        return $subscription;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        $subscription = Subscription::find($subscription->id);

        $subscription->delete();

        return response('resource deleted successfully', 200);
    }
}
