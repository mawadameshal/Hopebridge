<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttachmentCopy extends Model
{
    protected $table='customer_attachments_copy';
    protected $fillable = ['customer_id', 'name', 'title'];
    public $timestamps = false;
}
