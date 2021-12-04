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
        $this->call([
            
            CategorySeeder::class,
            UserStatusSeeder::class,
            UserSeeder::class,
            RoleSeeder::class,
            RoleUserSeeder::class,
            PostStatusSeeder::class,
            PostSeeder::class,
            SubscriptionPlanStatusSeeder::class,
            SubscriptionPlanSeeder::class,
            SubscriptionStatusSeeder::class,
            SubscriptionSeeder::class,
            PaymentMethodStatusSeeder::class,
            PaymentMethodSeeder::class,
            PaymentStatusSeeder::class,
            PaymentSeeder::class,
            CurrencySeeder::class,
            AdminProfileSeeder::class,
            UserProfileSeeder::class,
            ImageSeeder::class,

        ]);

    }
}
