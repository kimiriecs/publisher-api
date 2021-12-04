<?php

namespace Database\Seeders;

use App\Models\AdminProfile;
use Illuminate\Database\Seeder;

class AdminProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminProfile::factory(4)->create();
    }
}
