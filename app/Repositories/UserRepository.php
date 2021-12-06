<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\User;

class UserRepository implements UserRepositoryInterface 
{
  /**
   * Get the all users
   *
   * @return \Illuminate\Http\Response
   */ 
  public function getAllUsers()
  {
    $users = User::paginate(15);

    return $users;
  }


  /**
   * Get the all active users
   *
   * @return \Illuminate\Http\Response
   */ 
  public function getAllActiveUsers()
  {
    $users = User::where('user_status_id', 2)
                  ->paginate(15);

    return $users;
  }


  /**
   * Get the all active users orderd by descending order
   *
   * @return \Illuminate\Http\Response
   */ 
  public function getAllActiveUsersDescending()
  {
    $users = User::where('user_status_id', 2)
                  ->orderByDesc('id')
                  ->paginate(15);

    return $users;
  }


  /**
   * Get the all users by certain role
   *
   * @param  \App\Models\Role $role
   * @return \Illuminate\Http\Response
   */ 
  public function getAllUsersByRole(Role $role)
  {
    $users = User::where('role_id', $role)
                    ->paginate(5);

    return $users;
  }


  /**
   * Get the all active users by certain role
   *
   * @param  \App\Models\Role $role
   * @return \Illuminate\Http\Response
   */ 
  public function getActiveUsersByRole(Role $role)
  {
    $users = User::where('role_id', $role)
                    ->where('user_status_id', 2)
                    ->paginate(5);

    return $users;
  }

}