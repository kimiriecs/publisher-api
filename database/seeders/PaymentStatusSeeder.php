<?php

namespace Database\Seeders;

use App\Models\PaymentStatus;
use Illuminate\Database\Seeder;

class PaymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $paymentStatuses = [ 
            'succeeded',
            'pending',
            'complete',
            'refunded',
            'failed',
            'abandoned',
            'revoked',
            'preapproved',
            'cancelled',
        ];


        foreach ($paymentStatuses as $status) {

            PaymentStatus::factory()->create([

                'name' => $status,

            ]);
        }
    }
}
