<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $data = [
            'uuid' => $this->faker->uuid(),
            'nikname' => $this->faker->userName(),
            'phone' => $this->faker->phoneNumber(),
        ];

        return $data;
    }
}
