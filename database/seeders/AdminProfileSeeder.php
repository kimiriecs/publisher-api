<?php

namespace Database\Seeders;

use App\Models\AdminProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminsCount = DB::table('role_user')->whereIn('role_id', [1,2])->count();

        AdminProfile::factory($adminsCount)->create();
    }
}
