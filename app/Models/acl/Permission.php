<?php

namespace App\Models\acl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
      'name',
      'label',
      'deleted_at'
    ];

    public function roles(){
        return $this->belongsToMany(Role::class)
            ->whereNull("roles.deleted_at")
            ->whereNull("permission_role.deleted_at");
    }
}
