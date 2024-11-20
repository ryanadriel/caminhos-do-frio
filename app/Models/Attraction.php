<?php

namespace App\Models;

use App\Enums\ChargeTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    protected $fillable = [
      'name',
      'description',
      'image',
      'status',
      'city',
      'address',
      'number',
      'type',
      'price',
      'city_id'
    ];

    protected $casts = [
        'type' => ChargeTypeEnum::class,
    ];
}
