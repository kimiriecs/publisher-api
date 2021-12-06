<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $usersCount = 30;

        $administrationCount = 4;

        for ($i=0; $i < $usersCount; $i++) { 

            if ($i < $administrationCount) {

                User::factory()->create([
                    'profile_id' => $i+1,
                    'profile_type' => 'admin-profile',
                ]);

            } else {

                User::factory()->create([
                    'profile_id' => $i+1-$administrationCount,
                    'profile_type' => 'user-profile',
                ]);
                
            }
        }

    }
}
