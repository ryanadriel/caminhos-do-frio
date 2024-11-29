<?php

namespace App\Models\acl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $fillable = [
        'role_id',
        'user_id',
        'deleted_at'
    ];

    protected $table = 'role_user';

    public function roles(){
        return $this->belongsToMany(Role::class, "$this->table", "id", "role_id")
            ->whereNull("role_user.deleted_at");
    }

    public function roleDash(){
       return $this->belongsTo(Role::class, "role_id", "id");
    }
}
