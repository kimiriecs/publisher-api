<?php

namespace Database\Factories;

use App\Models\PaymentMethodStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentMethodFactory extends Factory
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
            'payment_method_status_id' => '',
        ];

        return $data;
    }
}
