<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FamilyCopy extends Model
{
    use SoftDeletes;
    protected $table = 'families_copy';
    protected $fillable = [ 'name' ,'dob' ,'jender_id' ,'card_no' ,'relation' ,'qualification_id' ,'social_id' ,'health_id' ,'job' ,'salary' ,'user_id','is_yatem'];

    protected $dates = ['dob'];
    public function jender(){
      return  $this->belongsTo(Jender::class,'jender_id');
    }

    public function health(){
      return  $this->belongsTo(Health::class,'health_id');
    }

    public function customer(){
        return $this->belongsTo(CustomerCopy::class,'customer_copy_id');
    }
    public function rel(){
        return  $this->belongsTo(RelationType::class,'relation');
    }

    public function qualification(){
        return  $this->belongsTo(Qualification::class);
    }


    public function social(){
        return  $this->belongsTo(SocialStatus::class);
    }

}
