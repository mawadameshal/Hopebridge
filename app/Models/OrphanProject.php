<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrphanProject extends Model
{
    use SoftDeletes;

    public function orphan(){
        return $this->belongsTo(Orphan::class,'orphan_id');
    }

    public function project(){
        return $this->belongsTo(Project::class,'project_id');
    }
}
