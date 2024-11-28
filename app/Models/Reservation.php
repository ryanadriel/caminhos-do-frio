<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "package_id",
        "total_price",
        "reservation_date",
        "deleted_at"
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
