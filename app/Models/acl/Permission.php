<?php

namespace App\Models\acl;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'name',
      'label',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class)
            ->withPivot('deleted_at')
            ->whereNull("roles.deleted_at")
            ->whereNull("permission_role.deleted_at");
    }
}
