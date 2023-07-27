<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    public static function validateData($request)
    {
        $rules = [
            'name' => "required",
            'sponser_id' => "required",

        ];

        $msg = [
            'name.required'=> 'حقل الاسم مطلوب',
            'sponser_id.required'=> 'حقل الممول مطلوب',
        ];

        return \Validator::make($request->all(), $rules,$msg);
    }

    public function saveData($name,$status,$sponser,$desc){

        $this->name=$name;
        $this->description=$desc;
        $this->sponser_id=$sponser;
        $this->amount=1;
        $this->status=1;//$status;
        $this->user_id=auth()->user()->id;

        if($this->save())
            return true;
    }

    public function Sponser(){
        return $this->belongsTo(ProjectSponser::class,'sponser_id');
    }
}
