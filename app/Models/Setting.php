<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    public function saveData($data){
        $this->name=$data["name"];
        $this->sys_name=$data["sys_name"];
        $this->address=$data["address"];
        $this->mobile=$data["mobile"];
        $this->phone=$data["phone"];
        $this->site=$data["site"];
        $this->email=$data["email"];
        if(isset($data["img_name"])){
            $this->img_name=$data["img_name"];

        }

       if ($this->save())
           return true;
    }

    public static function validateData($request)
    {
        $rules = [
            'name' => "required",
            'sys_name' => "required",
            'address' => "required",
            'mobile' => "required",
            'phone' => "required",
            'site' => "required",
            'email' => "required|email",

        ];


        $msg = [
            'name.required'=> 'حقل الاسم مطلوب',
            'sys_name.required'=> 'حقل اسم النظام مطلوب',
            'address.required'=> 'حقل العنوان مطلوب',
            'mobile.required'=> 'حقل الجوال مطلوب',
            'phone.required'=> 'حقل الهاتف مطلوب',
            'site.required'=> 'حقل الموقع مطلوب',
            'email.required'=> 'حقل الايميل مطلوب',
        ];

        return \Validator::make($request->all(), $rules,$msg);
    }
}
