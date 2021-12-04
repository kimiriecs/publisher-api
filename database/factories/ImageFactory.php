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
            'url' => '',
            'description' => '',
            'imageable_id' => '',
            'imageable_type' => '',
        ];

        return $data;
    }
}
