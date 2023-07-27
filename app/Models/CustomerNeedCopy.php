<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerNeedCopy extends Model
{
//    use SoftDeletes;
    protected $table = 'customer_needs_copy';
    public $timestamps=false;

    protected $fillable=['need','description','count'];
}
