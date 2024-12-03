<?php

namespace App\Models\acl;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PermissionRole extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'permission_id',
        'role_id',
    ];

    protected $table = 'permission_role';
}
