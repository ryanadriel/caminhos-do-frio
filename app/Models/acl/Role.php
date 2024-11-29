<?php

namespace App\Models\acl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
        'label',
        'deleted_at'
    ];

    public function permissions(){
        return $this->belongsToMany(Permission::class)
            ->whereNull('permissions.deleted_at')
            ->whereNull('role_user.deleted_at');
    }
}
