<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ownersCount = 1;
        $adminsCount = 3;
        
        $lastOwnerId = $ownersCount;
        $lastAdminId = $lastOwnerId + $adminsCount;


        // Create the owner
        $owners = User::query()
                    ->where('id', '<=', $lastOwnerId)
                    ->get();
        $ownerRole = Role::query()
                    ->where('name', 'owner')
                    ->first();
        foreach ($owners as $owner) {
            RoleUser::factory()->create([
                'user_id' => $owner->id,
                'role_id' => $ownerRole->id,
            ]);
        }


        // Create the admin
        $admins = User::query()
                        ->where('id', '>', $lastOwnerId)
                        ->where('id', '<=', $lastAdminId)
                        ->get();

        $adminRole = Role::query()
                        ->where('name', 'admin')
                        ->first();

        foreach ($admins as $admin) {
            RoleUser::factory()->create([
                'user_id' => $admin->id,
                'role_id' => $adminRole->id,
            ]);
        }


        // Create the trainees and folowers
        $authorsAndGuests = User::query()
                        ->where('id', '>', $lastAdminId)
                        ->get();

        $authorRole = Role::query()
                        ->where('name', 'author')
                        ->first();

        $guestRole = Role::query()
                        ->where('name', 'guest')
                        ->first();

        foreach ($authorsAndGuests as $user) {
            $roleId = '';
            if (rand(0, 1) > 0) {
                $roleId = $authorRole->id;
            } else {
                $roleId = $guestRole->id;
            }
            RoleUser::factory()->create([
                'user_id' => $user->id,
                'role_id' => $roleId,
            ]);
        }
    }
}