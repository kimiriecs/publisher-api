<?php

namespace Database\Factories;

use App\Models\UserStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        $name = $this->faker->name();

        $email = $this->faker->unique()->safeEmail();

        $email_verified_at = now();

        $password = Hash::make('password');

        $remember_token = Str::random(10);
        
        $status = UserStatus::all()->random()->id;

        $data = [
            'name' => $name,
            'email' => $email,
            'email_verified_at' => $email_verified_at,
            'password' => $password,
            'remember_token' => $remember_token,
            'user_status_id' => $status,
        ];

        return $data;
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
