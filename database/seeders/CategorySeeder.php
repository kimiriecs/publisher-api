<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rootCategory = 'categories';
        $mainCategories = ['users', 'managment', 'blog'];
        $subCategories = [
            ['roles', 'permissios', 'administration', 'authors', 'guests',],
            ['plans', 'subscriptions', 'payments'],
            ['parenting','pets','food','diy','finance','political','news','business','travel','sports','fitness','cars','movie','music','gaming','fashion',],
        ];


        $cName = $rootCategory;
        $parent_id = null;
        Category::factory()->create(
            [
                'name' =>  $cName,
                'slug' =>  Str::slug($cName),
                'description' => $this->faker->sentences(1),
                'parent_id' =>  $parent_id,
            ]
        );

        foreach ($mainCategories as $mainCategory) {
            $cName = $mainCategory;
            $parent_id = 1;
            Category::factory()->create(
                [
                    'name' =>  $cName,
                    'slug' =>  Str::slug($cName),
                    'description' => $this->faker->sentences(1),
                    'parent_id' =>  $parent_id,
                ]
            );
        }
        foreach ($subCategories as $key => $subCategory) {
            foreach ($subCategory as $category) {
                $cName = $category;
                $parent_id = $key + 2;
                Category::factory()->create(
                    [
                        'name' =>  $cName,
                        'slug' =>  Str::slug($cName),
                        'description' => $this->faker->sentences(1),
                        'parent_id' =>  $parent_id,
                    ]
                );
            }
        }
    }
}
