<?php

namespace Database\Seeders;

use App\Models\SubscriptionPlanStatus;
use Illuminate\Database\Seeder;

class SubscriptionPlanStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $subscriptionPlanStatuses = [ 
            'actual',
            'pending',
            'locked',
            'deprecated',
            'promotional',
            'popular',
            'top-rated',
            'revoked',
            'preapproved',
            'cancelled',
        ];


        foreach ($subscriptionPlanStatuses as $status) {

            SubscriptionPlanStatus::factory()->create([

                'name' => $status,

            ]);
        }
    }
}
