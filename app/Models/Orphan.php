<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orphan extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id', 'user_id', 'type', 'name', 'guardian_name', 'mobile', 'mobile2', 'state_id', 'region_id', 
        'address',  'deleted_at', 'birthday', 'researcher_opinion', 'researcher_rate', 'updated_id', 
        'file_no', 'father_name', 'father_date_death', 'father_death_reason', 'father_previous_profession',
        'father_previous_income', 'father_savings', 'stage','gender', 'card_no', 'orphan_missing', 'classroom', 
        'classroom_subjects_need_support', 'talents', 'child_guaranteed', 'academic_achievement',
        'guardians_name', 'guardians_age', 'guardians_card_no', 'guardians_relative_relation', 'guardians_qualification',
        'guardians_profession', 
        'guardians_income', 'do_children_live_with_their_mother', 'do_children_live_with_their_mother_reason',
        'school_stage_students', 'undergraduate_students', 'child_health_condition', 'child_psychological_behavioral_state',
        'family_count', 'male_count', 'female_count', 'other_member', 'other_relation', 'family_count_total',
        'income_sum',
        'house_owner', 'house_type', 'house_material', 'house_general_condition', 'other_available','total','rejection'
        ,'approval_create','approval_update','approval_delete'
    ];


    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->created_at = Carbon::now();
        $this->updated_at = Carbon::now();
    }

    protected static function boot()
    {
        parent::boot();

        self::updated(function ($product) {

            $changes = $product->isDirty() ? $product->getDirty() : false;

            if ($changes) {
                $data = "";
                foreach ($changes as $attr => $value) {
                    $data .= $attr . ":{" . $product->getOriginal($attr) . '=>' . $product->$attr . "},";
                }
                $url = "/Orphan/v1/{$product->id}/edit";

                Activity::log('orphan', " تمت تعديل بيانات اليتيم ({$product->name}) ", $data,$url);
            }

        });

        self::created(function ($model) {
            Activity::log('orphan', "تمت اضافة يتيم جديد برقم " . $model->id);
        });

        self::deleting(function ($model) {
            Activity::log('orphan', "تمت حذف يتيم باسم " . $model->name);

        });


    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault(['name' => 'غير مدخل']);
    }

    function guarantees()
    {
        return $this->hasMany(OrphanGuarantee::class, 'orphan_id', 'id');
    }

    function incomes()
    {
        return $this->hasMany(OrphanIncome::class, 'orphan_id', 'id');
    }

    function houseOwner()
    {
        return $this->belongsTo(HouseOwner::class, 'house_owner', 'id');
    }

    function HouseType()
    {
        return $this->belongsTo(HouseType::class, 'house_type', 'id');
    }

    function HouseMaterial()
    {
        return $this->belongsTo(HouseMaterial::class, 'house_material', 'id');
    }

    function HouseGeneralCondition()
    {
        return $this->belongsTo(HouseGeneralCondition::class, 'house_general_condition', 'id');
    }

    function furnitures()
    {
        return $this->belongsToMany(Furniture::class, 'orphan_furnitures', 'orphan_id', 'furniture_id')->withPivot('count', 'rate');
    }


// additional helper relation for the count
    public function furnituresSum()
    {
        return $this->belongsToMany(Furniture::class,'orphan_furnitures','orphan_id')
            ->withPivot('count', 'rate')
            ->selectRaw('sum(orphan_furnitures.rate) as aggregate')
            ->groupBy('orphan_id');
    }

// accessor for easier fetching the count
    public function getFurnituresSumAttribute()
    {
        if ( ! array_key_exists('furnituresSum', $this->relations)) $this->load('furnituresSum');

        $related = $this->getRelation('furnituresSum')->first();

        return ($related) ? $related->aggregate : 0;
    }

    public function needs()
    {
        return $this->hasMany(\App\Models\OrphanNeed::class, 'orphan_id', 'id');
    }

    public function attachments()
    {
        return $this->hasMany(\App\Models\OrphanAttachment::class);
    }

    public function childs()
    {
        return $this->hasMany(OrphanFamily::class, 'orphan_id', 'id');

    }

    public function getState()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function getRegion()
    {
        return $this->belongsTo(Region::class, 'region_id');

    }

    function projects()
    {
        return $this->hasMany(OrphanSponser::class, 'orphan_id', 'id');
    }


    protected $dates = ['birthday','father_date_death'];


    function scopeFilter($q)
    {
        if (request('name'))
            $q->where('name', 'like', "%" . request('name') . "%");
        if (request('type'))
            $q->where('type', request('type'));
        if (request('card_no')) {
            $q->where(function ($q) {
                $q->where('card_no', request('card_no'));
                $q->orWhere('card_no_wife', 'like', '%' . request('card_no') . '%');
            });

        }
        if (request('file_no'))
            $q->where('file_no', 'like', "%" . request('file_no') . "%");
        if (request('total'))
            $q->where('total', '>=', request('total'));
        if (request('total_to'))
            $q->where('total', '<=', request('total_to'));
        if (request('child_no'))
            $q->where('child_no', '>=', request('child_no'));
        if (request('child_no_to'))
            $q->where('child_no', '<=', request('child_no_to'));
        if (request('state'))
            $q->where('state_id', request('state'));
        if (request('region'))
            $q->where('region_id', request('region'));
        if (request('housetype'))
            $q->where('house_type', request('housetype'));
        if (request('material'))
            $q->where('house_material', request('material'));
        if (request('citizin'))
            $q->where('citizin', request('citizin'));
        if (request('region_type'))
            $q->where('region_type', request('region_type'));
        if (request('main_reason'))
            $q->where('main_reason', request('main_reason'));
        if (request('education'))
            $q->where('education', request('education'));
        if (request('work'))
            $q->where('work', request('work'));
        if (request('work_region'))
            $q->where('work_region', request('work_region'));
        if (request('beneficiary_count'))
            $q->has('projects', '>=', request('beneficiary_count'));
        if (request('beneficiary_count_to'))
            $q->has('projects', '<=', request('beneficiary_count_to'));
        if (request('customer_id'))
            $q->where('id', '>=', request('customer_id'));
        if (request('customer_id_to'))
            $q->where('id', '<=', request('customer_id_to'));

        if (request('child_university'))
            $q->where('child_university', '>=', request('child_university'));

        if (request('child_special'))
            $q->where('child_special', '>=', request('child_special'));

        if (request('work_day_no'))
            $q->where('work_day_no', '<=', request('work_day_no'));
        if (request('rejection')) {
            if (request('rejection') == 'reject')
                $q->whereNotNull('rejection');
            else
                $q->whereNull('rejection');
        }

    }

    function calculatePoint()
    {
        $points = 0;

//        add orphan missing
        if ($this->orphan_missing){
            if($this->orphan_missing == 3){
                $points += 3;
            }elseif ($this->orphan_missing == 2){
                $points += 2;
            }else{
                $points += 0;
            }
        }

//        add orphan guarantee
        if ($this->child_guaranteed){
            if($this->child_guaranteed == 1){
                $points += 0;
            }else{
                $points += 3;
            }
        }

//        add orphan guardians_relative_relation
        if ($this->guardians_relative_relation){
            if($this->guardians_relative_relation == 'ام'){
                $points += 3;
            }elseif ($this->guardians_relative_relation == 'جد' || $this->guardians_relative_relation == 'عم' || $this->guardians_relative_relation == 'خال'){
                $points += 2;
            }else{
                $points += 1;
            }
        }

//        add mother_current_marital_status
        if ($this->mother_current_marital_status){
            if($this->mother_current_marital_status == 1){
                $points += 3;
            }elseif ($this->mother_current_marital_status == 2) {
                $points += 2;
            }else {
                $points += 0;
            }
        }

//        add do_children_live_with_their_mother
        if ($this->do_children_live_with_their_mother){
            if($this->do_children_live_with_their_mother == 1){
                $points += 2;
            }else {
                $points += 1;
            }
        }


//        add family count
        if ($this->family_count_total) {
            if (intval($this->family_count_total) >= 7) {
                $points += 8;
            } else if (intval($this->family_count_total) >=4 && intval($this->family_count_total) <= 6) {
                $points += 6;
            } else {
                $points += 4;
            }
        }

        if (intval($this->school_stage_students) >= 1 && intval($this->school_stage_students) <= 2) {
            $points += 1;
        } else if (intval($this->school_stage_students) >= 3) {
            $points += 2;
        }else{
            $points += 0;
        }

        if (intval($this->undergraduate_students) >= 1 && intval($this->undergraduate_students) <= 2) {
            $points += 2;
        } elseif (intval($this->undergraduate_students) >= 3) {
            $points += 3;
        }else{
            $points += 0;
        }

        if (intval($this->child_health_condition) == 1) {
            $points += 0;
        } elseif (intval($this->child_health_condition) == 2) {
            $points += 1;
        }elseif (intval($this->child_health_condition) == 3) {
            $points += 3;
        }elseif (intval($this->child_health_condition) == 4) {
            $points += 6;
        }

        if (intval($this->child_psychological_behavioral_state) == 1) {
            $points += 0;
        } elseif (intval($this->child_psychological_behavioral_state) == 2) {
            $points += 0.5;
        }elseif (intval($this->child_psychological_behavioral_state) == 3) {
            $points += 1;
        }elseif (intval($this->child_psychological_behavioral_state) == 4) {
            $points += 2;
        }


        if ($this->income_sum) {
            if (intval($this->income_sum) < 500) {
                $points += 10;
            } elseif (intval($this->income_sum) >= 500 && intval($this->income_sum) < 1000) {
                $points+= 8;
            } elseif (intval($this->income_sum) >= 1000 && intval($this->income_sum) <= 1500) {
                $points += 4;
            } elseif (intval($this->income_sum) > 1500) {
                $points += 2;
            }
        }

//        house info
        if ($this->HouseType) {
            $points += $this->HouseType->orphan_values;
        }

        if ($this->houseOwner) {
            $points += $this->houseOwner->orphan_values;
        }

        if ($this->HouseMaterial) {
            $points += $this->HouseMaterial->orphan_values;
        }

        if ($this->HouseGeneralCondition) {
            $points += $this->HouseGeneralCondition->values;
        }

        if($this->furnitures){
            $furnitures_points = $this->furnituresSum;
            $points += $furnitures_points;
        }

        if ($this->researcher_rate) {
            $points += intval($this->researcher_rate);
        }

        $orphan_childs = OrphanFamily::where('orphan_id',$this->id)->get();

        if($orphan_childs){

            $sick = 0;
            $disability = 0;
             foreach ($orphan_childs as $child){
                 if ($child->health_id == 5){
                     $sick += 1;
                 }elseif ($child->health_id == 3){
                     $disability += 1;
                 }
             }

             if($sick == 1){
                 $points += 0.5;
             }elseif ($sick >= 2  && $sick <= 3){
                 $points += 1.5;
             } elseif ($sick > 3){
                 $points += 2.5;
             }

            if($disability == 1){
                $points += 1;
            }elseif ($disability >= 2  && $disability <= 3){
                $points += 3;
            } elseif ($disability > 3){
                $points += 5;
            }
        }

        $this->update(['total' => $points]);
        return $points;
    }




}
