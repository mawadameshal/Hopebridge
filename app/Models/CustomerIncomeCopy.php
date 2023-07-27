<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerIncomeCopy extends Model
{
//    use SoftDeletes;
    protected $table = 'customer_incomes_copy';

    protected $fillable=['income_source','income_type','income_amount','income_side'];
}
