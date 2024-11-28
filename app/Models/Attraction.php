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
      'address',
      'number',
      'type',
      'price',
      'city_id'
    ];

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'package__attractions');
    }

    protected $casts = [
        'type' => ChargeTypeEnum::class,
    ];
}
