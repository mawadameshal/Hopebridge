<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // protected $table = 'roles';

    public function actions()
    {
        return $this->belongsToMany(ActionModel::class, "role_actions", "role_id", "action_id");
    }

    public function users()
    {
        return $this->hasMany(User::class, "role_id");
    }

    public static function getRoleName($role_id)
    {
        $result = self::where("id", $role_id)->first();
        if ($result)
            return $result->name;
        return "";
    }

    public static function getRolesList(Array $filters = [], $order = "", $orderType = "asc")
    {
        return self::select(["roles.*", "sys_status.constant", "sys_status.value as role_status",
            \DB::raw('(select count(id) from users where role_id=roles.id) as userCounter')])
            ->leftJoin('lookup as sys_status', 'sys_status.id', '=', 'roles.status')
            ->where(function ($q) use ($filters) {
                if ($filters['from'])
                    $q->where('roles.created_at', '>=', $filters['from']);

                if ($filters['to'])
                    $q->where(\DB::raw('DATE_FORMAT(roles.created_at, "%Y-%m-%d")'), '<=', $filters['to']);

                if ($filters['name'])
                    $q->where('roles.name', 'like', '%' . $filters['name'] . '%');

                if ($filters['status'])
                    $q->where('roles.status', '=', $filters['status']);

            })
            ->orderBy($order ? $order : "id", $orderType)
            ->skip($filters['start'])
            ->limit(10)
            ->get();
    }

    public static function validateData($request, $id = "")
    {
        $rules = [
            'name' => "unique:roles,name," . $id,
            "action" => "array|required"
        ];
        $val = \Validator::make($request->all(), $rules);
        return $val;
    }

    public function getUserAction(){
        return self::with(["actions" => function($q) {
            $q->where('role_id',$this->id);
        }])->get();
    }
}

