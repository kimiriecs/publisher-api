<?php

namespace Database\Seeders;

use App\Models\PaymentMethodStatus;
use Illuminate\Database\Seeder;

class PaymentMethodStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paymentMethodStatuses = [ 
            'active',
            'inactive',
        ];


        foreach ($paymentMethodStatuses as $status) {

            PaymentMethodStatus::factory()->create([

                'name' => $status,

            ]);
        }
    }
}
