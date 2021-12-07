<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserStatus;
use App\Traits\HasRole;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    use HasRole;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        $first_name = $this->faker->firstName();

        $last_name = $this->faker->lastName();

        $full_name = $first_name . ' ' . $last_name;

        $email = $this->faker->unique()->safeEmail();

        $email_verified_at = now();

        $password = Hash::make('password');

        $slug =  Str::slug($full_name);

        $remember_token = Str::random(10);
        
        $status = UserStatus::all()->random()->id;



        $data = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'email_verified_at' => $email_verified_at,
            'password' => $password,
            'slug' => $slug,
            'remember_token' => $remember_token,
            'user_status_id' => $status,
            'profile_id' => '',
            'profile_type' => '',
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
