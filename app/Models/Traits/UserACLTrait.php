<?php


namespace App\Models\Traits;


/**
 * 
 */
trait UserACLTrait
{
    public function permissions()
    {
        $tenant = $this->tenant;
        $plan = $tenant->plan;

        $permissions = [];
        foreach ($plan->profiles as $profile) {
           foreach ($profile->permissions as $permission) {
               array_push($permissions, $permission->name);
           }
        }
        
        return $permissions;
    }

    public function hasPermission(string $permissionName): bool
    {
        return in_array($permissionName, $this->permissions());
    }

    public function isAdmin(): Bool
    {
        return in_array(auth()->user()->email, config('tenant.admins'));
    }

    public function isTenant(): Bool
    {
        return !in_array(auth()->user()->email, config('tenant.admins'));
    }
}