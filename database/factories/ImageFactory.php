<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $data = [
            'url' => $this->faker->imageUrl(400,400),
            'description' => $this->faker->sentence(3),
            'imageable_id' => '',
            'imageable_type' => '',
        ];

        return $data;
    }
}
