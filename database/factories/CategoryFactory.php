<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $data = [
            'name' =>  '',
            'slug' =>  '',
            'description' => '',
            'parent_id' =>  '',
        ];

        return $data;
    }
}
