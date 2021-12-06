<?php

namespace Database\Seeders;


use App\Models\UserProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $usersCount = DB::table('role_user')->whereNotIn('role_id', [1,2])->count();

        UserProfile::factory($usersCount)->create();
    }
}
