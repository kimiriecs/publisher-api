<?php

namespace Database\Factories;

use App\Models\SubscriptionPlan;
use App\Models\SubscriptionStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $encryption = $this->faker->numerify('##########');
        $posts_used_count = rand(0, 12);
        $day_remains = rand(0, 22);
        $started_at = now();
        $finished_at = now();
        $user_id = rand(1, User::all()->count());
        $subscription_plan_id = rand(1, SubscriptionPlan::all()->count());
        $subscription_status_id = rand(1, SubscriptionStatus::all()->count());
        $posts_total_count = SubscriptionPlan::find($subscription_plan_id)->posts_total_count;

        $data = [
            'encryption' => $encryption,
            'posts_total_count' => $posts_total_count,
            'posts_used_count' => $posts_used_count,
            'day_remains' => $day_remains,
            'started_at' => $started_at,
            'finished_at' => $finished_at,
            'user_id' => $user_id,
            'subscription_plan_id' => $subscription_plan_id,
            'subscription_status_id' => $subscription_status_id,
        ];


        return $data;
    }
}
