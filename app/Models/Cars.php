<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
 protected  $table='cars';
 protected $fillable =['name',
                'brand' ,
                'model',
                'year' ,
                'car_type' ,
                'daily_rent_price' ,
                'availability',
                'image'];
}
