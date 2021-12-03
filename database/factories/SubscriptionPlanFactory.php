<?php

namespace Database\Factories;

use App\Models\SubscriptionPlanStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriptionPlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $data = [
            'name' => '',
            'price' => '',
            'posts_total_count' => '',
            'subscription_period' => '',
            'subscription_plan_status_id' => '',
        ];

        return $data;
    }
}
