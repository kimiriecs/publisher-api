<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use App\Models\PaymentMethodStatus;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paymentMethods = [
            'debit cards',
            'credit cards',
            'mobile payments',
            'electronic bank transfers',
        ];

        
        foreach ($paymentMethods as $method) {
            
            // $payment_method_status_id = rand(1, PaymentMethodStatus::all()->count());

            PaymentMethod::factory()->create([
                'name' => $method,
                'payment_method_status_id' => rand(1, PaymentMethodStatus::all()->count()),
            ]);
        }
    }
}
