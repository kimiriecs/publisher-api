<?php

namespace Database\Seeders;

use App\Models\AdminProfile;
use App\Models\Image;
use App\Models\Post;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $adminProfiles = AdminProfile::all();

        foreach ($adminProfiles as $profile) {
            Image::factory()->create([
                'imageable_id' => $profile->id,
                'imageable_type' => 'admin-profile',
            ]);
        }



        $userProfiles = UserProfile::all();
        
        foreach ($userProfiles as $profile) {
            Image::factory()->create([
                'imageable_id' => $profile->id,
                'imageable_type' => 'user-profile',
            ]);
        }


        $posts = Post::all();
        
        foreach ($posts as $post) {
            Image::factory()->create([
                'imageable_id' => $post->id,
                'imageable_type' => 'post',
            ]);
        }
    }
}
