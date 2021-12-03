<?php

namespace Database\Seeders;

use App\Models\SubscriptionStatus;
use Illuminate\Database\Seeder;

class SubscriptionStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $subscriptionStatuses = [ 
            'active',
            'past_due',
            'unpaid',
            'canceled',
            'incomplete',
            'incomplete_expired',
            'trialing',
            'all',
            'ended',
        ];


        foreach ($subscriptionStatuses as $status) {

            SubscriptionStatus::factory()->create([

                'name' => $status,

            ]);
        }
    }
}
