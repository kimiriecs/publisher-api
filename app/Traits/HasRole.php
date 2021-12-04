<?php

namespace App\Traits;

use App\Models\Role;
use App\Models\User;


/**
 *  Check user roles
 */
trait HasRole
{
    
    /**
     * Check if the user has certain role
     *
     * @param \App\Models\Role $role
     * 
     * @return boolean
     */
    public function hasRole(Role $role)
    {
        return $this->roles()->get()->contains($role);
    }


    /**
     * Get the user by certain role
     *
     * @param \App\Models\Role $role
     * 
     * @return \App\Models\User $user
     */
    public static function findByRole(Role $role)
    {
        $user = $role->users()->get();

        return $user;
    }


    /**
     * Check if the user has 'owner' role
     *
     * @param \App\Models\Role $role
     * 
     * @return boolean
     */
    public function isOwner()
    {
        $role = Role::where('name', 'owner')->first();       
        
        $isOwner = $this->roles()->get()->contains($role);
        
        return $isOwner;
    }


    /**
     * Check if the user has 'admin' role
     *
     * @param \App\Models\Role $role
     * 
     * @return boolean
     */
    public function isAdmin()
    {
        $role = Role::where('name', 'admin')->first();

        $isAdmin = $this->roles()->get()->contains($role);

        return $isAdmin;
    }

}
 