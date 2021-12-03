<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\PostStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        $title = $this->faker->sentences(1, true);

        $body = $this->faker->paragraph(10);

        $author_id = User::all()->random()->id;

        $category_id = Category::all()->random()->id;

        $post_status_id = PostStatus::all()->random()->id;

        $data = [
            'title' => $title,
            'body' => $body,
            'author_id' => $author_id,
            'category_id' => $category_id,
            'post_status_id' => $post_status_id,
        ];

        return $data;
    }
}
