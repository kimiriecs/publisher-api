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
        $description = $this->faker->sentence(10);
        $data = [
            'name' =>  '',
            'slug' =>  '',
            'description' => $description,
            'parent_category_id' =>  '',
        ];

        return $data;
    }
}
