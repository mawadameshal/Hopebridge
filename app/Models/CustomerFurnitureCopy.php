<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerFurnitureCopy extends Model
{
//    use SoftDeletes;

    protected $table = 'customer_furnitures_copy';
        protected $fillable=['furniture_id','count','rate'];

        
}
