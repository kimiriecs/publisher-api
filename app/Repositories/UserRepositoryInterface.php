<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\User;
interface UserRepositoryInterface {

  public function getAllUsers();

  public function getAllActiveUsers();

  public function getAllActiveUsersDescending();

  public function getAllUsersByRole(Role $role);
  
  public function getActiveUsersByRole(Role $role);
    
}