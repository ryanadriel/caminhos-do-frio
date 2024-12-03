<?php

namespace App\Traits;

use App\Models\acl\Permission;

trait HasRolesAndPermissions
{
    public function hasPermission(Permission $permission)
    {
        return $this->roles
                    ->pluck('id')
                    ->intersect($permission->roles->pluck('id'))
                    ->isNotEmpty();
    }

    public function hasAnyRoles($roles)
    {
        if (is_array($roles) || is_object($roles)) {
            return $this->roles
                        ->pluck('name')
                        ->intersect(collect($roles)->pluck('name'))
                        ->isNotEmpty();
        }

        return $this->roles->contains('name', $roles);
    }

}
