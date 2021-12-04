<?php

namespace Database\Factories;

use App\Models\PaymentStatus;
use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $status = rand(1, PaymentStatus::all()->count());

        $encryption = $this->faker->numerify('##########');
        
        $user_id = rand(1, 30);
        $subscription_id = rand(1, 50);
        $payment_status_id = $status;
        $amount = Subscription::find($subscription_id)->plan->price;
        

        $data = [
            'encryption' => $encryption,
            'amount' => $amount,
            'user_id' => $user_id,
            'subscription_id' => $subscription_id,
            'payment_status_id' => $payment_status_id,
        ];


        return $data;
    }
}
