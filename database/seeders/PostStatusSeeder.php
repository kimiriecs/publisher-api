<?php

namespace Database\Seeders;

use App\Models\PostStatus;
use Illuminate\Database\Seeder;

class PostStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $postStatuses = [ 
            'publish',
            'future',
            'draft',
            'pending',
            'private',
            'trash',
            'auto-draft',
            'inherit',
        ];

        foreach ($postStatuses as $status) {

            PostStatus::factory()->create([

                'name' => $status,

            ]);
        }
    }
}
