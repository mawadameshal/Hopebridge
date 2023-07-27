<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerOutcomeCopy extends Model
{
//    use SoftDeletes;
    protected $table = 'customer_outcomes_copy';

    protected $fillable=['outcome_id','amount'];
}
