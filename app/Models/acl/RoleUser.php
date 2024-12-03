<?php

namespace App\Models\acl;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoleUser extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'role_id',
        'user_id',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function roleDash(){
       return $this->belongsTo(Role::class, "role_id", "id");
    }
}
