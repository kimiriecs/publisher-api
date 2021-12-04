<?php

namespace Database\Seeders;

use App\Models\SubscriptionPlan;
use App\Models\SubscriptionPlanStatus;
use Illuminate\Database\Seeder;

class SubscriptionPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $day = 86_400; // one day converted into seconds

        $subscriptionPlans = [
            [
                'name' => 'Trial',
                'price' => 0, //  conventional units (default: cent USA), will be converted to currency
                'posts_total_count' => 1,
                'subscription_period' => $day * 7,//604_800,// 7 days
            ],
            [
                'name' => 'Simple',
                'price' => 3_999, //  conventional units (default: cent USA), will be converted to currency
                'posts_total_count' => 3,
                'subscription_period' => $day * 30, //2_592_000,// 30 days
            ],
            [
                'name' => 'Standard',
                'price' => 5_999, //  conventional units (default: cent USA), will be converted to currency
                'posts_total_count' => 5,
                'subscription_period' => $day * 90, //7_776_000,// 90 days
            ],
            [
                'name' => 'Advanced',
                'price' => 7_999, //  conventional units (default: cent USA), will be converted to currency
                'posts_total_count' => 20,
                'subscription_period' => $day * 180, //15_552_000,// 180 days
            ],
            [
                'name' => 'Pro',
                'price' => 9_999, //  conventional units (default: cent USA), will be converted to currency
                'posts_total_count' => 50,
                'subscription_period' => $day * 365, // 31_536_000, // 365 days
            ],
            [
                'name' => 'Premium',
                'price' => 12_999, // conventional units (default: cent USA), will be converted to currency
                'posts_total_count' => null, // unlimited
                'subscription_period' => $day * 365, // 31_536_000, // 365 days
            ],
        ];

        foreach ($subscriptionPlans as $plan) {

            $status = rand(1, 10);
            // $status = rand(1, SubscriptionPlanStatus::all()->count());

            SubscriptionPlan::factory()->create([
                'name' => $plan['name'],
                'price' => $plan['price'],
                'posts_total_count' => $plan['posts_total_count'],
                'subscription_period' => $plan['subscription_period'],
                'subscription_plan_status_id' => $status,
                // 'subscription_plan_status_id' => rand(1, 10),
            ]);
        }
    }
}
