<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        UserStatusSeeder::class;
        SubscriptionStatusSeeder::class;
        PaymentStatusSeeder::class;
        PostStatusSeeder::class;
        UserSeeder::class;
        RoleSeeder::class;
        RoleUserSeeder::class;
        CategorySeeder::class;
        SubscriptionPlanSeeder::class;
        SubscriptionSeeder::class;
        PaymentSeeder::class;
        PostSeeder::class;
    }
}
