<?php

namespace App\Models\acl;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'label',
    ];

    public function permissions(){
        return $this->belongsToMany(Permission::class)
            ->whereNull('permissions.deleted_at')
            ->whereNull('permission_role.deleted_at');
    }
}
