<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{

    protected $fillable = ['admin_id', 'type', 'details', 'attr', 'from', 'to','url'];

    static function log($type, $details, $attr = '', $url = '' ,$from = '', $to = '')
    {
        \App\Models\Activity::create(['admin_id' => auth()->id(), 'type' => $type, 'details' => $details, 'attr' => $attr,'url' => $url,
            'from' => $from, 'to' => $to]);
    }

    function admin()
    {
        return $this->belongsTo(\App\User::class);
    }

    function state()
    {
        return $this->belongsTo(State, 'from');
    }

    function region()
    {
        return $this->belongsTo(Regoin, 'from');
    }

    function type()
    {
        return $this->belongsTo(State, 'from');
    }

    function citizin()
    {
        return $this->belongsTo(State, 'from');
    }


    function CustomerType()
    {
        return $this->belongsTo(CustomerType::class, 'from');
    }


    function HouseType()
    {
        return $this->belongsTo(HouseType::class, 'from');
    }

    function HouseMaterial()
    {
        return $this->belongsTo(HouseMaterial::class, 'from');
    }


    function RegionType()
    {
        return $this->belongsTo(RegionType::class, 'from');
    }


    function main_reason()
    {
        return $this->belongsTo(main_reason::class, 'from');
    }

    function Education()
    {
        return $this->belongsTo(Education::class, 'from');
    }


    function Work()
    {
        return $this->belongsTo(Work::class, 'from');
    }

    function WorkRegion()
    {
        return $this->belongsTo(WorkRegion::class, 'from');
    }

    function HouseOwner()
    {
        return $this->belongsTo(HouseOwner::class, 'from');
    }


    function HouseWallMaterial()
    {
        return $this->belongsTo(HouseWallMaterial::class, 'from');
    }

    function HouseShower()
    {
        return $this->belongsTo(HouseShower::class, 'from');
    }

    function FoodGaz()
    {
        return $this->belongsTo(FoodGaz::class, 'from');
    }

    function HouseRoom()
    {
        return $this->belongsTo(HouseRoom::class, 'from');
    }

    function Furniture()
    {
        return $this->belongsTo(Furniture::class, 'from');
    }


    function UserOpinion()
    {
        return $this->belongsTo(UserOpinion::class, 'from');
    }

    function Citizen()
    {
        return $this->belongsTo(Citizen::class, 'from');
    }


    function Jender()
    {
        return $this->belongsTo(Jender::class, 'from');
    }

    function Health()
    {
        return $this->belongsTo(Health::class, 'from');
    }

    function RelationType()
    {
        return $this->belongsTo(RelationType::class, 'from');
    }
    
    function scopeFilter($q)
    {


        if (request('admin_id'))
            $q->where('admin_id', request('admin_id'));

        if (request('type'))
            $q->where('type', request('type'));

    }

}
