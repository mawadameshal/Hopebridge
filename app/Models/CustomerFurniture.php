<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerFurniture extends Model
{
//    use SoftDeletes;

    protected $table = 'customer_furnitures2';
    
    public $timestamps = false;


}
