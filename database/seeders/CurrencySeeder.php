<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            'USD' => 'U+0024',
            'EUR' => 'U+20AC',
            'UAH' => 'U+20B4',
            'RUB' => 'U+20BD',
        ];

        foreach ($currencies as $name => $symbol) {
            Currency::factory()->create([
                'name' => $name,
                'symbol' => $symbol,
            ]);
        }
    }
}
