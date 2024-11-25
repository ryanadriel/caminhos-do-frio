<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
      "name",
      "description",
      "price",
      "image",
      "city_id",
      "status"
    ];

    public function city(){
        return $this->belongsTo(City::class);
    }
}
