<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\PostStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

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

        $admins_count = DB::table('role_user')->whereIn('role_id', [1,2])->count();

        $users_count = User::all()->count();

        $categories_count = Category::all()->count();

        $post_statuses_count = PostStatus::all()->count();

        $data = [
            'title' => $title,
            'body' => $body,
            'user_id' => rand($admins_count + 1, $users_count),
            'category_id' => rand(1, $categories_count),
            'post_status_id' => $post_statuses_count,
        ];

        return $data;
    }
}
