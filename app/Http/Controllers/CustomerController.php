<?php

namespace App\Http\Controllers;

use App\Models\Citizen;
use App\Models\Activity;
use App\Models\Customer;
use App\Models\CustomerCopy;
use App\Models\CustomerFurniture;
use App\Models\CustomerFurnitureCopy;
use App\Models\CustomerOutcome;
use App\Models\CustomerOutcomeCopy;
use App\Models\CustomerPost;
use App\Models\CustomerProject;
use App\Models\CustomerType;
use App\Models\Education;
use App\Models\Family;
use App\Models\FoodGaz;
use App\Models\Furniture;
use App\Models\Health;
use App\Models\HelpType;
use App\Models\HouseMaterial;
use App\Models\HouseOwner;
use App\Models\HouseRoom;
use App\Models\HouseShower;
use App\Models\HouseType;
use App\Models\HouseWallMaterial;
use App\Models\Jender;
use App\Models\main_reason;
use App\Models\Orphan;
use App\Models\Outcome;
use App\Models\Post;
use App\Models\Project;
use App\Models\Qualification;
use App\Models\Region;
use App\Models\RegionType;
use App\Models\RelationType;
use App\Models\Sms;
use App\Models\SocialStatus;
use App\Models\State;
use App\Models\UserOpinion;
use App\Models\Work;
use App\Models\WorkRegion;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        parent::$data['title'] = 'المستفيدين';
        parent::$data["breadcrumb"] = "المستفيدين";
        parent::$data["route"] = 'Customer';
        parent::$data["perm"] = 28;
    }

    public function index()
    {
        if (!in_array(27, parent::$data["allowedActions"]))
            return view('error.page-error-403');

        parent::getDataCounters();
        parent::$data['title'] = 'بحث عن المستفيدين';

        parent::$data['States'] = State::all();
        parent::$data['Regions'] = Region::all();
        parent::$data['RegionTypes'] = RegionType::all();
        parent::$data['MainReasons'] = main_reason::all();
        parent::$data['HelpTypes'] = HelpType::all();
        parent::$data['Educations'] = Education::where('status', 1)->get();
        parent::$data['Works'] = Work::where('status', 1)->get();
        parent::$data['WorkRegion'] = WorkRegion::where('status', 1)->get();
        parent::$data['HouseOwner'] = HouseOwner::where('status', 1)->get();
        parent::$data['HouseType'] = HouseType::where('status', 1)->get();
        parent::$data['HouseMaterial'] = HouseMaterial::where('status', 1)->get();
        parent::$data['HouseWallMaterial'] = HouseWallMaterial::where('status', 1)->get();
        parent::$data['HouseShower'] = HouseShower::where('status', 1)->get();
        parent::$data['FoodGaz'] = FoodGaz::where('status', 1)->get();
        parent::$data['HouseRoom'] = HouseRoom::where('status', 1)->get();
        parent::$data['Furnitures'] = Furniture::where('status', 1)->get();
        parent::$data['UserOpinion'] = UserOpinion::where('status', 1)->get();
        parent::$data['Citizens'] = Citizen::where('status', 1)->get();
        parent::$data['Types'] = CustomerType::where('status', 1)->get();
        parent::$data['Jenders'] = Jender::all();
        parent::$data['Healths'] = Health::all();
        parent::$data['Relation'] = RelationType::all();
        parent::$data['SocialStatus'] = SocialStatus::all();

        return view('customers.search', parent::$data);
    }

    public function index_not_approval()
    {
        if (!in_array(27, parent::$data["allowedActions"]))
            return view('error.page-error-403');

        parent::getDataCounters();
        parent::$data['title'] = 'بحث عن المستفيدين الاحتياطيين';

        parent::$data['States'] = State::all();
        parent::$data['Regions'] = Region::all();
        parent::$data['Users'] = User::all();
        parent::$data['RegionTypes'] = RegionType::all();
        parent::$data['MainReasons'] = main_reason::all();
        parent::$data['HelpTypes'] = HelpType::all();
        parent::$data['Educations'] = Education::where('status', 1)->get();
        parent::$data['Works'] = Work::where('status', 1)->get();
        parent::$data['WorkRegion'] = WorkRegion::where('status', 1)->get();
        parent::$data['HouseOwner'] = HouseOwner::where('status', 1)->get();
        parent::$data['HouseType'] = HouseType::where('status', 1)->get();
        parent::$data['HouseMaterial'] = HouseMaterial::where('status', 1)->get();
        parent::$data['HouseWallMaterial'] = HouseWallMaterial::where('status', 1)->get();
        parent::$data['HouseShower'] = HouseShower::where('status', 1)->get();
        parent::$data['FoodGaz'] = FoodGaz::where('status', 1)->get();
        parent::$data['HouseRoom'] = HouseRoom::where('status', 1)->get();
        parent::$data['Furnitures'] = Furniture::where('status', 1)->get();
        parent::$data['UserOpinion'] = UserOpinion::where('status', 1)->get();
        parent::$data['Citizens'] = Citizen::where('status', 1)->get();
        parent::$data['Types'] = CustomerType::where('status', 1)->get();
        parent::$data['Jenders'] = Jender::all();
        parent::$data['Healths'] = Health::all();
        parent::$data['Relation'] = RelationType::all();
        parent::$data['SocialStatus'] = SocialStatus::all();

        return view('customers.search_1', parent::$data);
    }

    public function create()
    {

        parent::getDataCounters();

        if (!in_array(28, parent::$data["allowedActions"]))
            return view('error.page-error-403');
        parent::$data['States'] = State::all();
        parent::$data['Regions'] = Region::all();
        parent::$data['RegionTypes'] = RegionType::all();
        parent::$data['MainReasons'] = main_reason::all();
        parent::$data['HelpTypes'] = HelpType::all();
        parent::$data['Educations'] = Education::where('status', 1)->get();
        parent::$data['Works'] = Work::where('status', 1)->get();
        parent::$data['WorkRegion'] = WorkRegion::where('status', 1)->get();
        parent::$data['HouseOwner'] = HouseOwner::where('status', 1)->get();
        parent::$data['HouseType'] = HouseType::where('status', 1)->get();
        parent::$data['HouseMaterial'] = HouseMaterial::where('status', 1)->get();
        parent::$data['HouseWallMaterial'] = HouseWallMaterial::where('status', 1)->get();
        parent::$data['HouseShower'] = HouseShower::where('status', 1)->get();
        parent::$data['FoodGaz'] = FoodGaz::where('status', 1)->get();
        parent::$data['HouseRoom'] = HouseRoom::where('status', 1)->get();
        parent::$data['Furnitures'] = Furniture::where('status', 1)->get();
        parent::$data['UserOpinion'] = UserOpinion::where('status', 1)->get();
        parent::$data['Citizens'] = Citizen::where('status', 1)->get();
        parent::$data['Types'] = CustomerType::where('status', 1)->get();
        parent::$data['Jenders'] = Jender::all();
        parent::$data['Healths'] = Health::all();
        parent::$data['Relation'] = RelationType::all();
        parent::$data['SocialStatus'] = SocialStatus::all();

        return view('customers.new', parent::$data);

    }

    function create_1()
    {
        if (session()->get('customer_id')) {
            session()->forget('customer_id');
        }


        parent::getDataCounters();

        if (!in_array(28, parent::$data["allowedActions"]))
            return view('error.page-error-403');
        parent::$data['States'] = State::all();
        parent::$data['Regions'] = Region::all();
        parent::$data['RegionTypes'] = RegionType::all();
        parent::$data['MainReasons'] = main_reason::all();
        parent::$data['HelpTypes'] = HelpType::all();
        parent::$data['Educations'] = Education::where('status', 1)->get();
        parent::$data['Works'] = Work::where('status', 1)->get();
        parent::$data['WorkRegion'] = WorkRegion::where('status', 1)->get();
        parent::$data['HouseOwner'] = HouseOwner::where('status', 1)->get();
        parent::$data['HouseType'] = HouseType::where('status', 1)->get();
        parent::$data['HouseMaterial'] = HouseMaterial::where('status', 1)->get();
        parent::$data['HouseWallMaterial'] = HouseWallMaterial::where('status', 1)->get();
        parent::$data['HouseShower'] = HouseShower::where('status', 1)->get();
        parent::$data['FoodGaz'] = FoodGaz::where('status', 1)->get();
        parent::$data['HouseRoom'] = HouseRoom::where('status', 1)->get();
        parent::$data['Furnitures'] = Furniture::where('status', 1)->get();
        parent::$data['UserOpinion'] = UserOpinion::where('status', 1)->get();
        parent::$data['Citizens'] = Citizen::where('status', 1)->get();
        parent::$data['Types'] = CustomerType::where('status', 1)->get();
        parent::$data['Jenders'] = Jender::all();
        parent::$data['Healths'] = Health::all();
        parent::$data['Relation'] = RelationType::all();
        parent::$data['SocialStatus'] = SocialStatus::all();
        parent::$data['customer'] = $customer = Customer::find(session()->get('customer_id')) ?? (new Customer());
        parent::$data['stage2'] = session()->get('stage') ?? 0;

        parent::$data['stage'] = $customer->stage ?? session()->get('stage') ?? 0;
        parent::$data['Qualifications'] = Qualification::orderBy('id', 'asc')->get();
        parent::$data['outcomes'] = Outcome::orderBy('id', 'asc')->get();

        return view('customers.create', parent::$data);
    }

    function show_1($id)
    {
        parent::getDataCounters();

        if (!in_array(28, parent::$data["allowedActions"]))
            return view('error.page-error-403');
        parent::$data['States'] = State::all();
        parent::$data['Regions'] = Region::all();
        parent::$data['RegionTypes'] = RegionType::all();
        parent::$data['MainReasons'] = main_reason::all();
        parent::$data['HelpTypes'] = HelpType::all();
        parent::$data['Educations'] = Education::where('status', 1)->get();
        parent::$data['Works'] = Work::where('status', 1)->get();
        parent::$data['WorkRegion'] = WorkRegion::where('status', 1)->get();
        parent::$data['HouseOwner'] = HouseOwner::where('status', 1)->get();
        parent::$data['HouseType'] = HouseType::where('status', 1)->get();
        parent::$data['HouseMaterial'] = HouseMaterial::where('status', 1)->get();
        parent::$data['HouseWallMaterial'] = HouseWallMaterial::where('status', 1)->get();
        parent::$data['HouseShower'] = HouseShower::where('status', 1)->get();
        parent::$data['FoodGaz'] = FoodGaz::where('status', 1)->get();
        parent::$data['HouseRoom'] = HouseRoom::where('status', 1)->get();
        parent::$data['Furnitures'] = Furniture::where('status', 1)->get();
        parent::$data['UserOpinion'] = UserOpinion::where('status', 1)->get();
        parent::$data['Citizens'] = Citizen::where('status', 1)->get();
        parent::$data['Types'] = CustomerType::where('status', 1)->get();
        parent::$data['Jenders'] = Jender::all();
        parent::$data['Healths'] = Health::all();
        parent::$data['Relation'] = RelationType::all();
        parent::$data['SocialStatus'] = SocialStatus::all();
        parent::$data['customer'] = $customer = Customer::findOrFail($id);
        parent::$data['customer']->calculatePoint();
        parent::$data['Qualifications'] = Qualification::orderBy('id', 'asc')->get();
        parent::$data['outcomes'] = Outcome::orderBy('id', 'asc')->get();
        parent::$data['stage2'] = session()->get('stage') ?? 0;
        parent::$data['help_count'] = CustomerProject::where('customer_id', $id)->get()->count();


        return view('customers.show', parent::$data);
    }

    function show_2($id)
    {
        parent::getDataCounters();

        if (!in_array(28, parent::$data["allowedActions"]))
            return view('error.page-error-403');
        parent::$data['States'] = State::all();
        parent::$data['Regions'] = Region::all();
        parent::$data['RegionTypes'] = RegionType::all();
        parent::$data['MainReasons'] = main_reason::all();
        parent::$data['HelpTypes'] = HelpType::all();
        parent::$data['Educations'] = Education::where('status', 1)->get();
        parent::$data['Works'] = Work::where('status', 1)->get();
        parent::$data['WorkRegion'] = WorkRegion::where('status', 1)->get();
        parent::$data['HouseOwner'] = HouseOwner::where('status', 1)->get();
        parent::$data['HouseType'] = HouseType::where('status', 1)->get();
        parent::$data['HouseMaterial'] = HouseMaterial::where('status', 1)->get();
        parent::$data['HouseWallMaterial'] = HouseWallMaterial::where('status', 1)->get();
        parent::$data['HouseShower'] = HouseShower::where('status', 1)->get();
        parent::$data['FoodGaz'] = FoodGaz::where('status', 1)->get();
        parent::$data['HouseRoom'] = HouseRoom::where('status', 1)->get();
        parent::$data['Furnitures'] = Furniture::where('status', 1)->get();
        parent::$data['UserOpinion'] = UserOpinion::where('status', 1)->get();
        parent::$data['Citizens'] = Citizen::where('status', 1)->get();
        parent::$data['Types'] = CustomerType::where('status', 1)->get();
        parent::$data['Jenders'] = Jender::all();
        parent::$data['Healths'] = Health::all();
        parent::$data['Relation'] = RelationType::all();
        parent::$data['SocialStatus'] = SocialStatus::all();
        parent::$data['customer'] = $customer = CustomerCopy::findOrFail($id);
        //parent::$data['customer']->calculatePoint();
        parent::$data['Qualifications'] = Qualification::orderBy('id', 'asc')->get();
        parent::$data['outcomes'] = Outcome::orderBy('id', 'asc')->get();
        parent::$data['stage2'] = session()->get('stage') ?? 0;
        parent::$data['help_count'] = CustomerProject::where('customer_id', $id)->get()->count();


        return view('customers.show_1', parent::$data);
    }

    function edit_1($id)
    {
        parent::getDataCounters();

        if (!in_array(28, parent::$data["allowedActions"]))
            return view('error.page-error-403');
        parent::$data['States'] = State::all();
        parent::$data['Regions'] = Region::all();
        parent::$data['RegionTypes'] = RegionType::all();
        parent::$data['MainReasons'] = main_reason::all();
        parent::$data['HelpTypes'] = HelpType::all();
        parent::$data['Educations'] = Education::where('status', 1)->get();
        parent::$data['Works'] = Work::where('status', 1)->get();
        parent::$data['WorkRegion'] = WorkRegion::where('status', 1)->get();
        parent::$data['HouseOwner'] = HouseOwner::where('status', 1)->get();
        parent::$data['HouseType'] = HouseType::where('status', 1)->get();
        parent::$data['HouseMaterial'] = HouseMaterial::where('status', 1)->get();
        parent::$data['HouseWallMaterial'] = HouseWallMaterial::where('status', 1)->get();
        parent::$data['HouseShower'] = HouseShower::where('status', 1)->get();
        parent::$data['FoodGaz'] = FoodGaz::where('status', 1)->get();
        parent::$data['HouseRoom'] = HouseRoom::where('status', 1)->get();
        parent::$data['Furnitures'] = Furniture::where('status', 1)->get();
        parent::$data['UserOpinion'] = UserOpinion::where('status', 1)->get();
        parent::$data['Citizens'] = Citizen::where('status', 1)->get();
        parent::$data['Types'] = CustomerType::where('status', 1)->get();
        parent::$data['Jenders'] = Jender::all();
        parent::$data['Healths'] = Health::all();
        parent::$data['Relation'] = RelationType::all();
        parent::$data['SocialStatus'] = SocialStatus::all();
        parent::$data['customer'] = $customer = Customer::findOrFail($id);
        parent::$data['customer']->calculatePoint();
        parent::$data['Qualifications'] = Qualification::orderBy('id', 'asc')->get();
        parent::$data['outcomes'] = Outcome::orderBy('id', 'asc')->get();
        parent::$data['stage2'] = session()->get('stage') ?? 0;
        parent::$data['help_count'] = CustomerProject::where('customer_id', $id)->get()->count();

        return view('customers.create', parent::$data);
    }

    public function store(Request $request)
    {

        $val = Customer::validateData($request);
        if ($val->fails())
            return response(["status" => false, "message" => $val->messages()], 422);


        $find = Customer::where('card_no', $request->get('card_no'))
            ->orwhere('card_no', $request->get('card_no_wife'))
            ->orwhere('card_no_wife', $request->get('card_no'))->get()->first();

        if (isset($find))
            return response(["status" => false, "message" => "رقم الهوية مسجل مسبقا بطلب رقم: " . $find->id, 403]);

        $child_w_v = 0;
        $child_nw_v = 1;
        $child_y_v = 0;
        $child_u_v = 1;
        $shown_help_v = 0;
        $unrwa_help_v = 0;
        $child_sp_v = 2;
        $mowaten = 0;
        $ref = 0;
        $recieve_help_v = 0;
        $total_degree = 62;

        $obj = new Customer();

        $obj->name = $request->get('cus_name');;
        $obj->card_no = $request->get('card_no');
        $obj->card_no_wife = $request->get('card_no_wife');
        $obj->type = $request->get('type');
        $obj->mobile = $request->get('mobile');
        $obj->note = $request->get('note');
        $obj->note2 = $request->get('note2');
        $obj->status = 1;
        $obj->state_id = $request->get('state_id');
        $obj->region_id = $request->get('region_id');
        $obj->father_name = $request->get('father_name');
        $obj->address = $request->get('address');
        $obj->cus_entry = $request->get('cus_entry');
        $obj->second_father = $request->get('second_father');
        $obj->citizin = $request->get('citizin');
        $obj->citizin_value = (($request->get('citizin')) == 1 ? $mowaten : $ref);
        $obj->region_type = $request->get('region_type');
        $region_type = RegionType::find($request->get('region_type'));
        $obj->region_type_value = $region_type->values;
        $obj->main_reason = $request->get('main_reason');
        $main_reson = main_reason::find($request->get('main_reason'));
        $obj->main_reason_value = $main_reson->values;
        $obj->child_not_working = $request->get('child_not_working');
        $obj->child_not_working_value = $child_nw_v * $request->get('child_not_working');
        $obj->child_working = $request->get('child_working');
        $obj->child_working_value = $child_w_v * $request->get('child_working');
        $obj->child_yatem_no = $request->get('child_yatem_no');
        $obj->child_yatem_no_value = $child_y_v * $request->get('child_yatem_no');
        $obj->child_university = $request->get('child_university');
        $obj->child_university_value = $child_u_v * $request->get('child_university');
        $obj->child_special = $request->get('child_special');
        $obj->child_special_value = $child_sp_v * $request->get('child_special');
        $obj->recieve_help = $request->get('recieve_help');
        $obj->recieve_help_value = (($request->get('recieve_help')) == 2 ? $recieve_help_v : 0);
        $obj->help_jeha_name = $request->get('help_jeha_name');
        $obj->help_types = $request->get('help_types');

        if ($request->get('help_types') <> "") {
            $help_type_obj = HelpType::find($request->get('help_types'));
            $obj->help_types_value = $help_type_obj->values;
            $help_type_value = $help_type_obj->values;
        } else {
            $obj->help_types_value = 0;
            $help_type_value = 0;
        }

        $obj->shown_help = $request->get('shown_help');
        $obj->shown_help_value = (($request->get('shown_help')) == 2 ? $shown_help_v : 0);
        $obj->unrwa_help = $request->get('unrwa_help');
        $obj->unrwa_help_value = (($request->get('unrwa_help')) == 2 ? $unrwa_help_v : 0);
        $obj->work_day_no = $request->get('work_day_no');
        $obj->education = $request->get('education');
        $edu_obj = Education::find($request->get('education'));
        $obj->education_value = $edu_obj->values;
        $obj->work = $request->get('work');
        $work_obj = Work::find($request->get('work'));
        $obj->work_value = $work_obj->values;
        $obj->work_region = $request->get('work_region');
        $work_reg_obj = WorkRegion::find($request->get('work_region'));
        $obj->work_region_value = $work_reg_obj->values;
        $obj->house_owner = $request->get('house_owner');
        $house_owner_obj = HouseOwner::find($request->get('house_owner'));
        $obj->house_owner_value = $house_owner_obj->values;
        $obj->house_type = $request->get('house_type');
        $house_type_obj = HouseType::find($request->get('house_type'));
        $obj->house_type_value = $house_type_obj->values;
        $obj->house_room = $request->get('house_room');
        $house_room_obj = HouseRoom::find($request->get('house_room'));
        $obj->house_room_value = $house_room_obj->values;
        $obj->house_material = $request->get('house_material');
        $house_mat_obj = HouseMaterial::find($request->get('house_material'));
        $obj->house_material_value = $house_mat_obj->values;
        $obj->wall_material = $request->get('wall_material');
        $wall_mat_obj = HouseWallMaterial::find($request->get('wall_material'));
        $obj->wall_material_value = $wall_mat_obj->values;
        $obj->house_shower = $request->get('house_shower');
        $house_shower_obj = HouseShower::find($request->get('house_shower'));
        $obj->house_shower_value = $house_shower_obj->values;
        $obj->food_gaz = $request->get('food_gaz');
        $food_gaz_obj = FoodGaz::find($request->get('food_gaz'));
        $obj->food_gaz_value = $food_gaz_obj->values;
        $obj->user_pinion = $request->get('user_pinion');
        $user_op_obj = UserOpinion::find($request->get('user_pinion'));
        $obj->user_pinion_value = $user_op_obj->values;
        $obj->user_id = auth()->user()->id;
        $total = $region_type->vales + $main_reson->values + $help_type_value + $edu_obj->values +
            $work_obj->values +
            $work_reg_obj->values +
            $house_owner_obj->values +
            $house_type_obj->values +
            $house_room_obj->values +
            $house_mat_obj->values +
            $wall_mat_obj->values +
            $house_shower_obj->values +
            $food_gaz_obj->values +
            $user_op_obj->values +
            (($request->get('shown_help')) == 2 ? $shown_help_v : 0) +
            (($request->get('unrwa_help')) == 2 ? $unrwa_help_v : 0) +
            (($request->get('citizin')) == 1 ? $mowaten : $ref) +
            (($request->get('recieve_help')) == 2 ? $recieve_help_v : 0) +
            $child_nw_v * $request->get('child_not_working') +
            $child_w_v * $request->get('child_working') +
            $child_y_v * $request->get('child_yatem_no') +
            $child_u_v * $request->get('child_university') +
            $child_sp_v * $request->get('child_special');
        $obj->total = $total;
        $obj->total_perc = round($total / $total_degree * 100, 2);

        $obj->child_no = $request->get('child_no');;
        $obj->death_date = $request->get('death_date');

        $sa = $obj->save();
        if ($obj->type == 3) {
            $obj->file_no = 'W-' . parent::$data["state_char"][$obj->state_id] . '-' . $obj->id;
            $obj->save();
        } else {
            $obj->file_no = parent::$data["state_char"][$obj->state_id] . '-' . $obj->id;
            $obj->save();
        }

        $child_name = $request->get('child_name');
        $child_relation = $request->get('child_relation');
        $child_dob = $request->get('child_dob');
        $child_jender = $request->get('child_jender');
        $child_health = $request->get('child_health');
        $child_card_no = $request->get('child_card_no');
        $child_work = $request->get('child_work');
        if (isset($child_name)) {

            for ($i = 0; $i < count($child_name); $i++) {
                if (($child_name[$i] <> "") && ($child_relation[$i] <> "")) {
                    $family = new Family();
                    $family->name = $child_name[$i];
                    $family->customer_id = $obj->id;
                    $family->relation = $child_relation[$i];
                    $family->card_no = $child_card_no[$i];
                    $family->work_id = $child_work[$i];
                    $family->jender_id = $child_jender[$i];
                    $family->dob = $child_dob[$i];
                    $family->health_id = $child_health[$i];
                    $family->is_yatem = $request->get('type');
                    $family->user_id = auth()->user()->id;
                    $family->save();
                }

            }
        }

        // Save Firnitures
        $furnitures = $request->get('furniture');
        if (isset($furnitures)) {
            foreach ($furnitures as $fur) {
                $obj_fur = new CustomerFurniture();
                $obj_fur->customer_id = $obj->id;
                $obj_fur->furniture_id = $fur;
                $obj_fur->user_id = auth()->user()->id;
                $obj_fur->save();
            }
        }
        return response(["status" => true, "message" => trans('ar.created_successfully'), "id" => $obj->id]);
    }


    function personal($id = 0, Request $request)
    {
        $this->validate($request, [
            'card_no' => 'required',
            'card_no_wife' => '',
            'name' => 'required',
            'type' => 'required',
            'state_id' => 'required',
            'region_id' => 'required',
            'neighborhood' => 'required',
            'address' => 'required',
            'street' => '',
            'mobile' => 'required',
            'researcher_name' => 'required',
            'mobile2' => '',
        ]);

        if ($request->card_no_wife) {
            $cards = explode(',', $request->card_no_wife);
            $cards = array_map('trim', $cards);
        } else
            $cards = [];
        $cards[] = trim($request->card_no);

        $idd = $id ?: session()->get('customer_id');

        $rs = Customer::query()
            ->where('id', '!=', $idd)
            ->where(function ($q) use ($cards) {

                foreach ($cards as $card) {
                    $q->orWhere('card_no', $card)
                        ->orWhere('card_no_wife', 'like', '%' . $card . '%');
                }
            });
        $rs = $rs->first();
        if ($rs)
            return response(['status' => 'fail', 'msg' => 'رقم الهوية متكرر في مستفيد أخر' . $rs->card_no . 'id:' . $rs->id]);


        $find = Orphan::where('card_no', $request->get('card_no'))->get()->first();

        if (isset($find))
            return response(['status' => 'fail', 'msg' => 'رقم الهوية متكرر في سجل الأيتام  ' . ' id:' . $find->id, 'id' => $find->id]);

        $data = $request->only('card_no', 'card_no_wife', 'name', 'state_id', 'researcher_name', 'region_id', 'neighborhood', 'address', 'street', 'mobile', 'mobile2', 'type');
        $id = $id ?: session()->get('customer_id');

        if ($id) {
            $data['updated_id'] = auth()->id();
            $data['main_id'] = $id;

            if ($request->type == 3) {
                $data['file_no'] = 'W-' . $this->state_char($request->state_id) . '-' . $id;
            } else {
                $data['file_no'] = $this->state_char($request->state_id) . '-' . $id;
            }


            $customercopy = CustomerCopy::where('main_id', $id)->first();
            if ($customercopy) {
                $customer = CustomerCopy::where('main_id', $id)->update($data);
                $data['file_no'] = $customercopy->file_no = $this->state_char($request->state_id) . '-' . $id;
                $customercopy->save();

            } else {
                $customer = CustomerCopy::create($data);
                if ($request->type == 3) {
                    $data['file_no'] = $customer->file_no = 'W-' . $this->state_char($request->state_id) . '-' . $id;
                } else {
                    $data['file_no'] = $customer->file_no = $this->state_char($request->state_id) . '-' . $id;
                }
                $customer->save();
            }


        } else {
            $data['user_id'] = auth()->id();
            $last_id = Customer::latest()->first()->id;
            $data['main_id'] = $last_id;
//            $customer = Customer::create($data);
            $customer = CustomerCopy::create($data);

            if ($request->type == 3) {
                $data['file_no'] = $customer->file_no = 'W-' . $this->state_char($request->state_id) . '-' . $last_id;
            } else {
                $data['file_no'] = $customer->file_no = $this->state_char($request->state_id) . '-' . $last_id;
            }
            $customer->save();

            session()->put('customer_id', $customer->main_id);
        }
        return response(['status' => 'success', 'msg' => 'تم الحفظ بنجاح', 'id' => $id, 'file_no' => $data['file_no']]);
    }

    function attachments($id = 0, Request $request)
    {

        $this->validate($request, [
            'title.*' => '',
            'name.*' => '',
        ]);

        $data = [];
        foreach ($request->title ?? [] as $key => $title) {
            if ($title) {
                if (isset($request->name[$key]))
                    $path = $request->name[$key]->store('attachments');
                else
                    $path = '';
                $data[] = ['name' => $path, 'title' => $request->title[$key]];
            }
        }
        $id = $id ?: session()->get('customer_id');

        if ($id) {

//            $customer = Customer::where('id', $id)->first();
//            $customer->attachments()->whereNotIn('id', $request->ids ?? [])->delete();
//
//            $customer->attachments()->createMany($data);


            $customercopy = CustomerCopy::where('main_id', $id)->first();
            $data_cus['main_id'] = $id;
            $customercopy->update($data_cus);
            if ($customercopy) {
                $customercopy->attachments()->whereNotIn('id', $request->ids ?? [])->delete();
                $customercopy->attachments()->createMany($data);
            }

        } else {
            return redirect()->back()->with('error', 'لا يوجد مستفيد الرجاء البدء من جديد');

        }

        foreach ($request->attachment ?? [] as $key => $attachment) {
            $path = $attachment->store('attachments');
            $customercopy->attachments()->where('id', $key)->update(['name' => $path]);

        }

        return redirect()->back()->with('msg', 'تم الحفظ بنجاح')->with(['stage' => 8, 'id' => $id]);

        // return response(['status' => 'success', 'msg' => 'تم الحفظ بنجاح', 'id' => $id]);
    }

    function fatherInfo($id = 0, Request $request)
    {
        $this->validate($request, [
            'father_name' => 'required',
            'birthday' => 'required',
            'social_id' => 'required',
            'health_id' => 'required',
            'Handicap_type' => 'required_if:health,3',
            'disease' => 'required_if:health,5',
            'qualification_id' => 'required',
        ]);

        $data = $request->only('father_name', 'birthday', 'social_id', 'health_id', 'Handicap_type', 'disease', 'qualification_id');
        if (!$id)
            $data['stage'] = 2;
        else
            $data['updated_id'] = auth()->id();

        $id = $id ?: session()->get('customer_id');

        if ($id) {
//            $customer = Customer::where('id', $id)->first();
//            if ($customer) {
//                $customer->update($data);
//                $points = $customer->calculatePoint();
//            }

            $customercopy = CustomerCopy::where('main_id', $id)->first();
            $points = 0;
            if ($customercopy) {
//                $data['main_id'] = $id;
                $customercopy->update($data);
                $points = $customercopy->calculatePoint();
            }

            return response(['status' => 'success', 'msg' => 'تم الحفظ بنجاح', 'id' => $id, 'points' => $points]);


        } else {
            return response(['status' => 'fail', 'msg' => 'لا يوجد مستفيد الرجاء البدء من جديد']);
        }

    }

    function familyComposition($id = 0, Request $request)
    {
        $this->validate($request, [
            'family_count' => 'required|integer',
            'male_count' => 'required|integer',
            'female_count' => 'required|integer',
            'other_member' => 'required|in:0,1',
            'other_relation' => 'required_if:other_member,1',
            'family_count_total' => 'required|integer',
            'child_working' => 'required|integer',
            'child_not_working' => 'nullable|integer',
            'child_school' => 'nullable|integer',
            'child_university' => 'nullable|integer',
            'child_special' => 'nullable|integer',
        ]);
        $data = $request->only('family_count', 'male_count', 'female_count', 'other_member', 'other_relation', 'family_count_total', 'child_working', 'child_not_working', 'child_school', 'child_university', 'child_special');
        if (!$id)
            $data['stage'] = 3;
        else
            $data['updated_id'] = auth()->id();


        $id = $id ?: session()->get('customer_id');

        if ($id) {
//            $customer = Customer::where('id', $id)->first();
//            if ($customer) {
//                $customer->update($data);
//                $points = $customer->calculatePoint();
//            }
            $customercopy = CustomerCopy::where('main_id', $id)->first();
            $points = 0;
            if ($customercopy) {
                $data['main_id'] = $id;
                $customercopy->update($data);
                $points = $customercopy->calculatePoint();
            }
        } else {
            return response(['status' => 'fail', 'msg' => 'لا يوجد مستفيد الرجاء البدء من جديد']);
        }
        return response(['status' => 'success', 'msg' => 'تم الحفظ بنجاح', 'id' => $id, 'points' => $points]);
    }

    function workInfo($id = 0, Request $request)
    {

        $this->validate($request, [
            'job_name' => 'required',
            'name_income' => 'required|integer',
            'income_source.*' => 'nullable',
            'income_type.*' => 'nullable',
            'income_amount' => 'nullable|array|min:1',
            'income_amount.*' => 'nullable|integer',
            'income_side.*' => 'nullable',
            'outcome.*' => 'required|integer',
            'outcome' => 'required|array|min:7',
        ], [
            'outcome.*.required' => 'ادخل جميع حقول المصروفات',
            'income_amount.required' => 'الرجاء اضافة بيانات الدخل'
        ]);
        $data = $request->only('job_name', 'name_income');


        if (!$id)
            $data['stage'] = 4;
        else
            $data['updated_id'] = auth()->id();

        $data['income_sum'] = array_sum($request->income_amount ?? []);
        $data['outcome_sum'] = array_sum($request->outcome ?? []);
        $id = $id ?: session()->get('customer_id');


        if ($id) {
//            $customer = Customer::where('id', $id)->firstOrFail();
//
//            $customer->job_name = $data['job_name'];
//            $customer->name_income = $data['name_income'];
//            $customer->save();
//
//            $points = $customer->calculatePoint();

            $customercopy = CustomerCopy::where('main_id', $id)->first();
            if ($customercopy) {
                $data['main_id'] = $id;
                $customercopy->update($data);
                $points = $customercopy->calculatePoint();
            }

            $incomes = [];
            foreach ($request->income_source ?? [] as $key => $income) {
                $incomes [] = [
                    'income_source' => $income,
                    'income_type' => $request->income_type[$key] ?? '',
                    'income_amount' => $request->income_amount[$key] ?? '',
                    'income_side' => $request->income_side[$key] ?? '',
                ];
            }
            $customercopy->incomes()->delete();
            $customercopy->incomes()->createMany($incomes);

            $outcomes = [];
            foreach ($request->outcome as $key => $outcome) {
                $outcomes [$key] = [
                    'amount' => $outcome
                ];
            }
            $customercopy->outcomes()->sync($outcomes);
        } else {
            return response(['status' => 'fail', 'msg' => 'لا يوجد مستفيد الرجاء البدء من جديد']);
        }
        return response(['status' => 'success', 'msg' => 'تم الحفظ بنجاح', 'id' => $id, 'points' => $points]);
    }

    function housingData($id = 0, Request $request)
    {
        $this->validate($request, [
            'house_owner' => 'required',
            'house_type' => 'required|integer',
            'house_material' => 'required',
            'furnitures' => 'required|array',
            'furnitures_rate' => 'required|array',
        ], [
            'house_owner.required' => 'الرجاء اخنر بيانات السكن',
            'house_type.required' => 'الرجاء اخنر نوع السكن',
            'house_material.required' => 'الرجاء اخنر بناء السقف',
        ]);
        $data = $request->only('house_owner', 'house_type', 'house_material');
        if (!$id)
            $data['stage'] = 5;
        else
            $data['updated_id'] = auth()->id();


        $id = $id ?: session()->get('customer_id');

        if ($id) {
//            $customer = Customer::where('id', $id)->firstOrFail();
//            $customer->update($data);
//            $points = $customer->calculatePoint();

            $customercopy = CustomerCopy::where('main_id', $id)->first();
            if ($customercopy) {
                $data['main_id'] = $id;
                $customercopy->update($data);
                $points = $customercopy->calculatePoint();
            }


            $furnitures = [];
            if ($request->furnitures) {
                foreach ($request->furnitures as $key => $furniture) {

                    $furnitures [$key] = [
                        'count' => $furniture ?? 0,
                        'rate' => $request->furnitures_rate[$key] ?? 0,
                        'user_id' => auth()->id(),
                    ];

                }


                $customercopy->furnitures()->sync($furnitures);
            }


            $needs = [];
            foreach ($request->need ?? [] as $key => $need) {
                $needs [] = [
                    'need' => $need,
                    'description' => $request->description[$key] ?? '',
                    'count' => $request->count[$key] ?? '',
                ];
            }

            $customercopy->needs()->delete();
            $customercopy->needs()->createMany($needs);


        } else {
            return response(['status' => 'fail', 'msg' => 'لا يوجد مستفيد الرجاء البدء من جديد']);
        }
        return response(['status' => 'success', 'msg' => 'تم الحفظ بنجاح', 'id' => $id, 'points' => $points]);
    }

    function researcher($id = 0, Request $request)
    {
        $this->validate($request, [
            'researcher_opinion' => 'required',
            'researcher_rate' => 'required|integer',
        ]);
        $data = $request->only('researcher_opinion', 'researcher_rate');
        if (!$id)
            $data['stage'] = 6;
        else
            $data['updated_id'] = auth()->id();

        $id = $id ?: session()->get('customer_id');

        if ($id) {
//            $customer = Customer::where('id', $id)->firstOrFail();
//            $customer->update($data);
//              $points = $customer->calculatePoint();

            $customercopy = CustomerCopy::where('main_id', $id)->first();
            if ($customercopy) {
                $data['main_id'] = $id;
                $customercopy->update($data);
            }
            $points = $customercopy->calculatePoint();

        } else {
            return response(['status' => 'fail', 'msg' => 'لا يوجد مستفيد الرجاء البدء من جديد']);
        }
        return response(['status' => 'success', 'msg' => 'تم الحفظ بنجاح', 'id' => $id, 'points' => $points]);
    }

    function familyCompositionDetails($id = 0, Request $request)
    {
        $this->validate($request, [
            'child_name' => 'nullable|array',
            'child_dob' => 'nullable|array',
            'child_dob.*' => 'nullable|date_format:Y',
            'child_jender' => 'nullable|array',
            'child_card_no.*' => 'nullable|integer',
            'child_card_no' => 'nullable|array',
            'child_relation' => 'nullable|array',
            'child_qualification' => 'nullable|array',
            'child_social' => 'nullable|array',
            'child_health' => 'nullable|array',
            'child_job' => 'nullable|array',
            'child_salary' => 'nullable|array',
            'child_salary.*' => 'nullable|integer',

        ], [
            'child_dob.*.date_format' => 'يجب ان يكون سنة الميلاد صحيحا',
            'child_card_no.*.integer' => 'يجب ان يكون رقم الهوية رقما صحيحا',
            'child_salary.*.integer' => 'يجب ان يكون الراتب رقما صحيحا',
        ]);

        $data = $request->only('house_owner', 'house_type', 'house_material');
        if (!$id)
            $data['stage'] = 7;
        else
            $data['updated_id'] = auth()->id();


        $id = $id ?: session()->get('customer_id');


        if ($id) {
//            $customer = Customer::where('id', $id)->firstOrFail();
//            $customer->update($data);
            $customercopy = CustomerCopy::where('main_id', $id)->first();
            if ($customercopy) {
                $data['main_id'] = $id;
                $customercopy->update($data);
                $points = $customercopy->calculatePoint();
            }


            $children = [];
            foreach ($request->child_name ?? [] as $key => $child) {
                $children[] = [
                    'name' => $child,
                    'card_no' => $request->child_card_no[$key] ?? '',
                    'dob' => Carbon::createFromFormat('Y', $request->child_dob[$key]) ?? '',
                    'jender_id' => $request->child_jender[$key] ?? '',
                    'relation' => $request->child_relation[$key] ?? '',
                    'health_id' => $request->child_health[$key] ?? '',
                    'qualification_id' => $request->child_qualification[$key] ?? '',
                    'social_id' => $request->child_social[$key] ?? '',
                    'job' => $request->child_job[$key] ?? '',
                    'salary' => $request->child_salary[$key] ?? '',
                    'is_yatem' => 0,
                    'user_id' => auth()->id()
                ];
            }


            $customercopy->childs()->delete();
            $customercopy->childs()->createMany($children);
        } else {
            return response(['status' => 'fail', 'msg' => 'لا يوجد مستفيد الرجاء البدء من جديد']);
        }
        return response(['status' => 'success', 'msg' => 'تم الحفظ بنجاح', 'id' => $id]);
    }

    public function update(Request $request)
    {

        $customer_id = $request->get('customer_id');

        $obj = Customer::find($customer_id);
        if (!isset($obj))
            return response(["status" => false, "message" => trans('ar.not_exist_customer')]);

        $val = Customer::validateData($request, $obj);
        if ($val->fails())
            return response(["status" => false, "message" => $val->messages()], 422);

        $find = Customer::where('card_no', $request->get('card_no_wife'))
            ->orwhere('card_no_wife', $request->get('card_no'))->get()->first();

        if (isset($find))
            return response(["status" => false, "message" => "رقم الهوية مسجل مسبقا بطلب رقم: " . $find->id, 422]);

        $region_type = RegionType::find($request->get('region_type'));


        $child_w_v = 0;
        $child_nw_v = 1;
        $child_y_v = 0;
        $child_u_v = 1;
        $shown_help_v = 0;
        $unrwa_help_v = 0;
        $child_sp_v = 2;
        $mowaten = 0;
        $ref = 0;
        $recieve_help_v = 0;
        $total_degree = 62;


        $obj->name = $request->get('cus_name');;
        $obj->card_no = $request->get('card_no');
        $obj->card_no_wife = $request->get('card_no_wife');
        $obj->type = $request->get('type');
        $obj->mobile = $request->get('mobile');
        $obj->note = $request->get('note');
        $obj->note2 = $request->get('note2');
        $obj->status = 1;
        $obj->state_id = $request->get('state_id');
        $obj->region_id = $request->get('region_id');
        $obj->father_name = $request->get('father_name');
        $obj->address = $request->get('address');
        $obj->cus_entry = $request->get('cus_entry');
        $obj->second_father = $request->get('second_father');
        $obj->citizin = $request->get('citizin');
        $obj->citizin_value = (($request->get('citizin')) == 1 ? $mowaten : $ref);
        $obj->region_type = $request->get('region_type');
        $obj->region_type_value = $region_type->values;
        $obj->main_reason = $request->get('main_reason');
        $main_reson = main_reason::find($request->get('main_reason'));
        $obj->main_reason_value = $main_reson->values;
        $obj->child_not_working = $request->get('child_not_working');
        $obj->child_not_working_value = $child_nw_v * $request->get('child_not_working');
        $obj->child_working = $request->get('child_working');
        $obj->child_working_value = $child_w_v * $request->get('child_working');
        $obj->child_yatem_no = $request->get('child_yatem_no');
        $obj->child_yatem_no_value = $child_y_v * $request->get('child_yatem_no');
        $obj->child_university = $request->get('child_university');
        $obj->child_university_value = $child_u_v * $request->get('child_university');
        $obj->child_special = $request->get('child_special');
        $obj->child_special_value = $child_sp_v * $request->get('child_special');
        $obj->recieve_help = $request->get('recieve_help');
        $obj->recieve_help_value = (($request->get('recieve_help')) == 2 ? $recieve_help_v : 0);
        $obj->help_jeha_name = $request->get('help_jeha_name');
        $obj->help_types = $request->get('help_types');
        if ($request->get('help_types') <> "") {
            $help_type_obj = HelpType::find($request->get('help_types'));
            $obj->help_types_value = $help_type_obj->values;
            $help_type_value = $help_type_obj->values;
        } else {
            $obj->help_types_value = 0;
            $help_type_value = 0;
        }

        $obj->shown_help = $request->get('shown_help');
        $obj->shown_help_value = (($request->get('shown_help')) == 2 ? $shown_help_v : 0);
        $obj->unrwa_help = $request->get('unrwa_help');
        $obj->unrwa_help_value = (($request->get('unrwa_help')) == 2 ? $unrwa_help_v : 0);
        $obj->work_day_no = $request->get('work_day_no');
        $obj->education = $request->get('education');
        $edu_obj = Education::find($request->get('education'));
        $obj->education_value = $edu_obj->values;
        $obj->work = $request->get('work');
        $work_obj = Work::find($request->get('work'));
        $obj->work_value = $work_obj->values;
        $obj->work_region = $request->get('work_region');
        $work_reg_obj = WorkRegion::find($request->get('work_region'));
        $obj->work_region_value = $work_reg_obj->values;
        $obj->house_owner = $request->get('house_owner');
        $house_owner_obj = HouseOwner::find($request->get('house_owner'));
        $obj->house_owner_value = $house_owner_obj->values;
        $obj->house_type = $request->get('house_type');
        $house_type_obj = HouseType::find($request->get('house_type'));
        $obj->house_type_value = $house_type_obj->values;
        $obj->house_room = $request->get('house_room');
        $house_room_obj = HouseRoom::find($request->get('house_room'));
        $obj->house_room_value = $house_room_obj->values;
        $obj->house_material = $request->get('house_material');
        $house_mat_obj = HouseMaterial::find($request->get('house_material'));
        $obj->house_material_value = $house_mat_obj->values;
        $obj->wall_material = $request->get('wall_material');
        $wall_mat_obj = HouseWallMaterial::find($request->get('wall_material'));
        $obj->wall_material_value = $wall_mat_obj->values;
        $obj->house_shower = $request->get('house_shower');
        $house_shower_obj = HouseShower::find($request->get('house_shower'));
        $obj->house_shower_value = $house_shower_obj->values;
        $obj->food_gaz = $request->get('food_gaz');
        $food_gaz_obj = FoodGaz::find($request->get('food_gaz'));
        $obj->food_gaz_value = $food_gaz_obj->values;
        $obj->user_pinion = $request->get('user_pinion');
        $user_op_obj = UserOpinion::find($request->get('user_pinion'));
        $obj->user_pinion_value = $user_op_obj->values;
        $obj->user_id = auth()->user()->id;
        $total = $region_type->vales + $main_reson->values + $help_type_value + $edu_obj->values +
            $work_obj->values +
            $work_reg_obj->values +
            $house_owner_obj->values +
            $house_type_obj->values +
            $house_room_obj->values +
            $house_mat_obj->values +
            $wall_mat_obj->values +
            $house_shower_obj->values +
            $food_gaz_obj->values +
            $user_op_obj->values +
//            (($request->get('shown_help')) == 2 ? $shown_help_v : 0)+
//            (($request->get('unrwa_help')) == 2 ? $unrwa_help_v : 0)+
//            (($request->get('citizin')) == 1 ? $mowaten : $ref)+
            (($request->get('recieve_help')) == 2 ? $recieve_help_v : 0) +
            $child_nw_v * $request->get('child_not_working') +
            $child_w_v * $request->get('child_working') +
            $child_y_v * $request->get('child_yatem_no') +
            $child_u_v * $request->get('child_university') +
            $child_sp_v * $request->get('child_special');
        $obj->total = $total;
        $obj->total_perc = round($total / $total_degree * 100, 2);


        $obj->child_no = $request->get('child_no');;
        $obj->death_date = $request->get('death_date');

        $sa = $obj->save();
        if ($obj->type == 3) {
            $obj->file_no = 'W-' . parent::$data["state_char"][$obj->state_id] . '-' . $obj->id;
            $obj->save();
        } else {
            $obj->file_no = parent::$data["state_char"][$obj->state_id] . '-' . $obj->id;
            $obj->save();
        }

        // save family
        $child_name = $request->get('child_name');
        $child_relation = $request->get('child_relation');
        $child_dob = $request->get('child_dob');
        $child_jender = $request->get('child_jender');
        $child_health = $request->get('child_health');
        $child_card_no = $request->get('child_card_no');
        $child_work = $request->get('child_work');

        if (isset($child_name)) {

            for ($i = 0; $i < count($child_name); $i++) {
                if (($child_name[$i] <> "") && ($child_relation[$i] <> "")) {

                    $family = new Family();

                    $family->name = $child_name[$i];
                    $family->customer_id = $obj->id;
                    $family->relation = $child_relation[$i];
                    $family->card_no = $child_card_no[$i];
                    $family->work_id = $child_work[$i];
                    $family->jender_id = $child_jender[$i];
                    $family->dob = $child_dob[$i];
                    $family->health_id = $child_health[$i];
                    $family->is_yatem = $request->get('type');
                    $family->user_id = auth()->user()->id;
                    $family->save();

                }

            }
        }
        // في حال تعديل حالة المستفيد الى كفالة ايتام
        // يتم تحويل ابناءه الى ايتام
        if ($request->get('type') == 2) {
            $childs = Family::where('customer_id', $customer_id)->get();
            foreach ($childs as $child) {
                $child->is_yatem = 2;
                $child->save();
            }
        }

        // Save Firnitures الاساس المنزلي
        $furnitures = $request->get('furniture');
        $all_fur = Furniture::where('status', 1)->get();
        if (isset($furnitures)) {
            foreach ($furnitures as $fur) {
                $exist_fur = CustomerFurniture::where('customer_id', $obj->id)->where('furniture_id', $fur)->get()->first();
                //  dd($exist_fur);
                if (!isset($exist_fur)) {
                    $obj_fur = new CustomerFurniture();
                    $obj_fur->customer_id = $obj->id;
                    $obj_fur->furniture_id = $fur;
                    $obj_fur->user_id = auth()->user()->id;
                    $obj_fur->save();
                }
            }
            // حذف الصفوف المحفوظة من قبل وغير مسجلة الان
            foreach ($all_fur as $one_fur) {
                if (!in_array($one_fur->id, $furnitures)) {
                    $del = CustomerFurniture::where('customer_id', $obj->id)->where('furniture_id', $one_fur->id);
                    $del->delete();
                }
            }
        } // اذا لم يحدد اي شي يتم حذف الجميع
        else {
            $del_all = CustomerFurniture::where('customer_id', $obj->id)->delete();
        }


        return response(["status" => true, "message" => trans('ar.update_successfully')]);

    }

    public function getall(Request $request)
    {
        return DataTables::of(Customer::where('type', 1)
            ->with('getstate', 'getregion', 'gettype', 'user')->withCount('projects')->filter()
        )
            ->addColumn('action', function ($query) {
                $link = "";
                if (in_array(30, parent::$data["allowedActions"]))
                    $link = $link . '<a href="Customer/v1/' . $query->id . '/show"  class="btn btn-circle btn-icon-only btn-primary" title="عرض" id="show_btn"> <i class="fa fa-eye"></i> </a>';
                if (in_array(27, parent::$data["allowedActions"]))
                    $link = $link . '<a href="Customer/v1/' . $query->id . '/edit"  class="btn btn-circle btn-icon-only btn-green" title="تعديل" id="edit_btn"> <i class="fa fa-edit"></i> </a>';
                if (in_array(30, parent::$data["allowedActions"]))
                    $link = $link . '<a href="' . url('' . parent::$data["route"] . '/delete/' . $query->id . '') . '" class="btn btn-circle btn-icon-only btn-danger" id="delete_btn" title="حذف"><i class="fa fa-trash"></i> </a>';
                if (in_array(30, parent::$data["allowedActions"])) {
                    if (!$query->rejection)
                        $link = $link . '<a href="' . url('' . parent::$data["route"] . '/reject/' . $query->id . '') . '" class="btn btn-circle btn-icon-only btn-info reject_btn" title="رفض"><i class="fa fa-ban"></i> </a>';
                    else
                        $link = $link . '<a href="' . url('' . parent::$data["route"] . '/recovery/' . $query->id . '') . '" class="btn btn-circle btn-icon-only btn-success recovery_btn"  title="استرجاع"><i class="fa fa-undo"></i> </a>';

                }
                $link = $link . '<a href="' . url('customerProject2/' . $query->id) . '" style="font-size: 12px !important;width: 55px;" id="project_count" class="btn btn-success">عرض المشاريع</a>';

                return $link;
            })
            ->make(true);

    }

    public function getall_1(Request $request)
    {

        return DataTables::of(CustomerCopy::where('type', 1)
            ->with('getstate', 'getregion', 'gettype', 'user', 'approved')->withCount('projects')->filter()
        )->editColumn('updated_id', function ($query) {
            if ($query->updated_id) {
                return User::where('id', $query->updated_id)->first()->name;
            } else {
                return 'غير مدخل';
            }

        })
            ->addColumn('action', function ($query) {
                $link = "";
                if (in_array(30, parent::$data["allowedActions"]))
                    $link = $link . '<a href="Customer/v2/' . $query->id . '/show"  class="btn btn-circle btn-icon-only btn-primary" title="عرض" id="show_btn"> <i class="fa fa-eye"></i> </a>';
                if (in_array(30, parent::$data["allowedActions"])) {
                    $check = Customer::where('id', $query->main_id)->first();
                    if (!$check) {
                        $link = $link . '<a href="' . url('' . parent::$data["route"] . '/approve/' . $query->main_id . '') . '"  style="width: 60%;" class="btn btn-circle btn-icon-only btn-info approve_btn" title="موافقة">قبول اضافة</a>';
                    } else {
                        $link = $link . '<a href="' . url('' . parent::$data["route"] . '/approve/' . $query->main_id . '') . '" style="width: 60%;" class="btn btn-circle btn-icon-only btn-info approve_btn" title="موافقة">قبول تعديل</a>';

                    }
                }

                return $link;
            })
            ->make(true);

    }

    function reject($id, Request $request)
    {
        $this->validate($request, [
            'rejection' => 'required',
        ], [
            'rejection.required' => 'الرجاء ادخل سبب الرفض'
        ]);

        Customer::where('id', $id)->update(['rejection' => $request->rejection]);
        return redirect()->back()->with('msg', 'تم رفض المستفيد بنجاح');
    }


    function approve($id, Request $request)
    {

        $customer_copy = CustomerCopy::where('main_id', $id)->first();


        if ($customer_copy) {
// اذا كان المستفيد موجود

            $customer = Customer::where('id', $customer_copy->main_id)->first();
            if ($customer) {
                // في حالة قبول التعديل

                if ($request['submit'] == 'accept') {
                    // update customer then delete the copy
                    $customer_copy['approved_id'] = auth()->id();
                    // $customer_copy['updated_id'] = $customer_copy->updated_id;
                    $customer->update($customer_copy->toArray());
//
                    if ($customer_copy->incomes) {
                        $incomes = [];
                        foreach ($customer_copy->incomes as $income) {
                            $incomes [] = [
                                'income_source' => $income->income_source,
                                'income_type' => $income->income_type ?? '',
                                'income_amount' => $income->income_amount ?? '',
                                'income_side' => $income->income_side ?? '',
                            ];
                        }
                        $customer->incomes()->delete();
                        $customer->incomes()->createMany($incomes);

                    }
                    $customer_copy->incomes()->delete();

                    if ($customer_copy->outcomes) {
                        $xx = CustomerOutcomeCopy::where('customer_id', $customer_copy->id)->get();
                        $outcomes = [];
                        foreach ($xx as $outcome) {
                            $outcomes [] = [
                                'outcome_id' => $outcome->outcome_id,
                                'amount' => $outcome->amount
                            ];

                        }


                        CustomerOutcome::where('customer_id', $id)->delete();
                        foreach ($outcomes as $outcome) {

                            $obj_fur = new CustomerOutcome();
                            $obj_fur->customer_id = $id;
                            $obj_fur->amount = $outcome['amount'];
                            $obj_fur->outcome_id = $outcome['outcome_id'];
                            $obj_fur->save();
                        }

                    }
                    CustomerOutcomeCopy::where('customer_id', $customer_copy->id)->delete();

                    if ($customer_copy->furnitures) {
                        $xx = CustomerFurnitureCopy::where('customer_copy_id', $customer_copy->id)->get();
                        $furnitures = [];
                        foreach ($xx as $furniture) {
                            $furnitures [] = [
                                'furniture_id' => $furniture->furniture_id,
                                'count' => $furniture->count ?? 0,
                                'rate' => $furniture->rate,
                                'user_id' => $furniture->user_id,
                            ];

                        }
                        CustomerFurniture::where('customer_id', $id)->delete();
                        foreach ($furnitures as $furniture) {

                            $obj_fur = new CustomerFurniture();
                            $obj_fur->customer_id = $id;
                            $obj_fur->furniture_id = $furniture['furniture_id'];
                            $obj_fur->rate = $furniture['rate'];
                            $obj_fur->count = $furniture['count'] ?? 0;
                            $obj_fur->user_id = $furniture['user_id'];
                            $obj_fur->save();
                        }

                    }
                    CustomerFurnitureCopy::where('customer_copy_id', $customer_copy->id)->delete();

                    if ($customer_copy->needs) {
                        $needs = [];
                        foreach ($customer_copy->needs as $need) {
                            $needs [] = [
                                'need' => $need->need,
                                'description' => $need->description ?? '',
                                'count' => $need->cosunt ?? '',
                            ];
                        }
                        $customer->needs()->delete();
                        $customer->needs()->createMany($needs);

                    }
                    $customer_copy->needs()->delete();
//
                    if ($customer_copy->childs) {
                        $children = [];
                        foreach ($customer_copy->childs ?? [] as $child) {

                            $children[] = [
                                'name' => $child->name,
                                'card_no' => $child->card_no ?? '',
                                'dob' => $child->dob ?? '',
                                'jender_id' => $child->jender_id ?? '',
                                'relation' => $child->relation ?? '',
                                'health_id' => $child->health_id ?? '',
                                'qualification_id' => $child->qualification_id ?? '',
                                'social_id' => $child->social_id ?? '',
                                'job' => $child->job ?? '',
                                'salary' => $child->salary ?? '',
                                'is_yatem' => 0,
                                'user_id' => auth()->id()
                            ];
                        }


                        $customer->childs()->delete();
                        $customer->childs()->createMany($children);
                    }
                    $customer_copy->childs()->delete();

                    if ($customer_copy->attachments) {
                        $attachments = [];
                        foreach ($customer_copy->attachments as $attachment) {
                            $attachments[] = [
                                'name' => $attachment->name,
                                'title' => $attachment->title
                            ];
                        }

                        $customer->attachments()->delete();
                        $customer->attachments()->createMany($attachments);
                    }
                    $customer_copy->attachments()->delete();
                    $customer_copy->delete();

                    return redirect()->back()->with('msg', ' تم قبول تعديلات المستفيد بنجاح');


                } //في حالة رفض التعديل
                elseif ($request['submit'] == 'reject') {
                    $customer_copy->childs()->delete();
                    $customer_copy->needs()->delete();
                    CustomerFurnitureCopy::where('customer_copy_id', $customer_copy->id)->delete();
                    $customer_copy->incomes()->delete();
                    CustomerOutcomeCopy::where('customer_id', $customer_copy->id)->delete();
                    $customer_copy->attachments()->delete();
                    $customer_copy->delete();

                    return redirect()->back()->with('msg', 'تم رفض تعديلات المستفيد');
                }
            } // اذا كان المستفيد مضاف جديد
            else {
                if ($request['submit'] == 'accept') {
                    // create new customer then delete the copy
                    $customer = new Customer();
                    $customer_copy['approved_id'] = auth()->id();
                    // $customer_copy['user_id'] = $customer_copy->user_id;
                    $customer::create($customer_copy->toArray());

                    if ($customer_copy->incomes) {
                        $incomes = [];
                        foreach ($customer_copy->incomes as $income) {
                            $incomes [] = [
                                'income_source' => $income->income_source,
                                'income_type' => $income->income_type ?? '',
                                'income_amount' => $income->income_amount ?? '',
                                'income_side' => $income->income_side ?? '',
                            ];
                        }
                        $customer->incomes()->delete();
                        $customer->incomes()->createMany($incomes);

                    }
                    $customer_copy->incomes()->delete();

                    if ($customer_copy->outcomes) {
                        $xx = CustomerOutcomeCopy::where('customer_id', $customer_copy->id)->get();
                        $outcomes = [];
                        foreach ($xx as $outcome) {
                            $outcomes [] = [
                                'outcome_id' => $outcome->outcome_id,
                                'amount' => $outcome->amount
                            ];

                        }


                        CustomerOutcome::where('customer_id', $id)->delete();
                        foreach ($outcomes as $outcome) {

                            $obj_fur = new CustomerOutcome();
                            $obj_fur->customer_id = $id;
                            $obj_fur->amount = $outcome['amount'];
                            $obj_fur->outcome_id = $outcome['outcome_id'];
                            $obj_fur->save();
                        }

                    }
                    CustomerOutcomeCopy::where('customer_id', $customer_copy->id)->delete();

                    if ($customer_copy->furnitures) {
                        $xx = CustomerFurnitureCopy::where('customer_copy_id', $customer_copy->id)->get();
                        $furnitures = [];
                        foreach ($xx as $furniture) {
                            $furnitures [] = [
                                'furniture_id' => $furniture->furniture_id,
                                'count' => $furniture->count ?? 0,
                                'rate' => $furniture->rate,
                                'user_id' => $furniture->user_id,
                            ];

                        }
                        CustomerFurniture::where('customer_id', $id)->delete();
                        foreach ($furnitures as $furniture) {

                            $obj_fur = new CustomerFurniture();
                            $obj_fur->customer_id = $id;
                            $obj_fur->furniture_id = $furniture['furniture_id'];
                            $obj_fur->rate = $furniture['rate'];
                            $obj_fur->count = $furniture['count'] ?? 0;
                            $obj_fur->user_id = $furniture['user_id'];
                            $obj_fur->save();
                        }

                    }
                    CustomerFurnitureCopy::where('customer_copy_id', $customer_copy->id)->delete();

                    if ($customer_copy->needs) {
                        $needs = [];
                        foreach ($customer_copy->needs as $need) {
                            $needs [] = [
                                'need' => $need->need,
                                'description' => $need->description ?? '',
                                'count' => $need->cosunt ?? '',
                            ];
                        }
                        $customer->needs()->delete();
                        $customer->needs()->createMany($needs);

                    }
                    $customer_copy->needs()->delete();
//
                    if ($customer_copy->childs) {
                        $children = [];
                        foreach ($customer_copy->childs ?? [] as $child) {

                            $children[] = [
                                'name' => $child->name,
                                'card_no' => $child->card_no ?? '',
                                'dob' => $child->dob ?? '',
                                'jender_id' => $child->jender_id ?? '',
                                'relation' => $child->relation ?? '',
                                'health_id' => $child->health_id ?? '',
                                'qualification_id' => $child->qualification_id ?? '',
                                'social_id' => $child->social_id ?? '',
                                'job' => $child->job ?? '',
                                'salary' => $child->salary ?? '',
                                'is_yatem' => 0,
                                'user_id' => auth()->id()
                            ];
                        }


                        $customer->childs()->delete();
                        $customer->childs()->createMany($children);
                    }
                    $customer_copy->childs()->delete();

                    if ($customer_copy->attachments) {
                        $attachments = [];
                        foreach ($customer_copy->attachments as $attachment) {
                            $attachments[] = [
                                'name' => $attachment->name,
                                'title' => $attachment->title
                            ];
                        }

                        $customer->attachments()->delete();
                        $customer->attachments()->createMany($attachments);
                    }
                    $customer_copy->attachments()->delete();
                    $customer_copy->delete();

                    return redirect()->back()->with('msg', ' تم قبول اضافة المستفيد بنجاح');
                } else {
                    $customer_copy->childs()->delete();
                    $customer_copy->needs()->delete();
                    CustomerFurnitureCopy::where('customer_copy_id', $customer_copy->id)->delete();
                    $customer_copy->incomes()->delete();
                    CustomerOutcomeCopy::where('customer_id', $customer_copy->id)->delete();
                    $customer_copy->attachments()->delete();
                    $customer_copy->delete();
                    return redirect()->back()->with('msg', 'تم رفض اضافة المستفيد');

                }
            }
        }

    }

    function recovery($id)
    {
        Customer::where('id', $id)->update(['rejection' => NULL]);

        return redirect()->back()->with('msg', 'تم استرجاع المستفيد بنجاح');

    }

    public function show($id)
    {

        parent::getDataCounters();


        if (!in_array(27, parent::$data["allowedActions"]))
            return view('error.page-error-403');

        $customer = Customer::find($id);
        if (isset($customer)) {

            parent::$data['route'] = 'Customer/show';
            parent::$data['customer'] = $customer;
            parent::$data['States'] = State::all();
            parent::$data['Regions'] = Region::all();
            parent::$data['RegionTypes'] = RegionType::all();
            parent::$data['MainReasons'] = main_reason::all();
            parent::$data['HelpTypes'] = HelpType::all();
            parent::$data['Educations'] = Education::where('status', 1)->get();
            parent::$data['Works'] = Work::where('status', 1)->get();
            parent::$data['WorkRegion'] = WorkRegion::where('status', 1)->get();
            parent::$data['HouseOwner'] = HouseOwner::where('status', 1)->get();
            parent::$data['HouseType'] = HouseType::where('status', 1)->get();
            parent::$data['HouseMaterial'] = HouseMaterial::where('status', 1)->get();
            parent::$data['HouseWallMaterial'] = HouseWallMaterial::where('status', 1)->get();
            parent::$data['HouseShower'] = HouseShower::where('status', 1)->get();
            parent::$data['FoodGaz'] = FoodGaz::where('status', 1)->get();
            parent::$data['HouseRoom'] = HouseRoom::where('status', 1)->get();
            parent::$data['Furnitures'] = Furniture::where('status', 1)->get();
            parent::$data['UserFurnitures'] = CustomerFurniture::where('customer_id', $id)->pluck("furniture_id")->toArray();
            parent::$data['UserOpinion'] = UserOpinion::where('status', 1)->get();
            parent::$data['Citizens'] = Citizen::where('status', 1)->get();
            parent::$data['Types'] = CustomerType::where('status', 1)->get();
            parent::$data['Jenders'] = Jender::all();
            parent::$data['Healths'] = Health::all();
            parent::$data['Relation'] = RelationType::all();
            parent::$data['help_count'] = CustomerProject::where('customer_id', $id)->get()->count();

            return view('customers.show', parent::$data);

        } else
            return response(["status" => true, "message" => "لا يوجد مستفيد بهدا الاسم ", 200]);

    }

    public function edit($id)
    {

        parent::getDataCounters();


        if (!in_array(27, parent::$data["allowedActions"]))
            return view('error.page-error-403');

        $customer = Customer::find($id);
        if (isset($customer)) {

            parent::$data['route'] = 'Customer/update';
            parent::$data['customer'] = $customer;
            parent::$data['States'] = State::all();
            parent::$data['Regions'] = Region::all();
            parent::$data['RegionTypes'] = RegionType::all();
            parent::$data['MainReasons'] = main_reason::all();
            parent::$data['HelpTypes'] = HelpType::all();
            parent::$data['Educations'] = Education::where('status', 1)->get();
            parent::$data['Works'] = Work::where('status', 1)->get();
            parent::$data['WorkRegion'] = WorkRegion::where('status', 1)->get();
            parent::$data['HouseOwner'] = HouseOwner::where('status', 1)->get();
            parent::$data['HouseType'] = HouseType::where('status', 1)->get();
            parent::$data['HouseMaterial'] = HouseMaterial::where('status', 1)->get();
            parent::$data['HouseWallMaterial'] = HouseWallMaterial::where('status', 1)->get();
            parent::$data['HouseShower'] = HouseShower::where('status', 1)->get();
            parent::$data['FoodGaz'] = FoodGaz::where('status', 1)->get();
            parent::$data['HouseRoom'] = HouseRoom::where('status', 1)->get();
            parent::$data['Furnitures'] = Furniture::where('status', 1)->get();
            parent::$data['UserFurnitures'] = CustomerFurniture::where('customer_id', $id)->pluck("furniture_id")->toArray();
            parent::$data['UserOpinion'] = UserOpinion::where('status', 1)->get();
            parent::$data['Citizens'] = Citizen::where('status', 1)->get();
            parent::$data['Types'] = CustomerType::where('status', 1)->get();
            parent::$data['Jenders'] = Jender::all();
            parent::$data['Healths'] = Health::all();
            parent::$data['Relation'] = RelationType::all();
            parent::$data['help_count'] = CustomerProject::where('customer_id', $id)->get()->count();

            return view('customers.edit', parent::$data);

        } else
            return response(["status" => true, "message" => "لا يوجد مستفيد بهدا الاسم ", 200]);

    }

    public function delete($id)
    {

        $customer = Customer::find($id);
        if (isset($customer)) {
            if ($customer->delete())
                return response(["status" => true, "message" => trans('ar.delete_successfully'), 200]);
            else  return response(["status" => true, "message" => "حدث مشكلة في الحذف ", 200]);
        } else
            return response(["status" => true, "message" => "لا يوجد مستفيد بهدا الاسم ", 200]);

    }

    public function send_message(Request $request)
    {
        foreach ($request->get('ids') as $id) {

            $customer = Customer::find($id);
            if ($customer) {
                $message = new Sms();
                $message->mobile = $customer->mobile;
                $message->message = $request->get('message');
                $message->customer_id = $customer->id;
                $message->user_id = auth()->user()->id;
                if ($message->save()) {
                    $messageText = $request->get('message');
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                        CURLOPT_URL => "https://www.tweetsms.ps/api.php?comm=sendsms&user=Jesr.Alamal&pass=258258&to=$customer->mobile&message=$messageText&sender=Jesr.Alamal",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_CUSTOMREQUEST => "GET",
                        CURLOPT_HTTPHEADER => array(
                            "Content-Type:application/json",
                            "Accept:application/json",
                        ),
                    ));

                    $response = curl_exec($curl);
                    curl_close($curl);

                }
            } else
                return response(["status" => true, "message" => "لا يوجد مستفيد بهدا الاسم ", 200]);
        }
        return response(["status" => true, "message" => "تم الارسال", 200]);
    }

    // استخراج كشوفات المستفيدين
    public function needCustomer()
    {
        parent::getDataCounters();
        parent::$data["route"] = 'apply/customer';
        parent::$data["Projects"] = Project::where('status', 1)->get();
        parent::$data['States'] = State::all();
        parent::$data['Regions'] = Region::all();
        parent::$data['HouseType'] = HouseType::where('status', 1)->get();
        parent::$data['HouseMaterial'] = HouseMaterial::where('status', 1)->get();
        parent::$data['Types'] = CustomerType::where('status', 1)->get();


        parent::$data['RegionTypes'] = RegionType::all();
        parent::$data['MainReasons'] = main_reason::all();
        parent::$data['Educations'] = Education::where('status', 1)->get();
        parent::$data['Works'] = Work::where('status', 1)->get();
        parent::$data['WorkRegion'] = WorkRegion::where('status', 1)->get();
        parent::$data['HouseOwner'] = HouseOwner::where('status', 1)->get();
        parent::$data['HouseType'] = HouseType::where('status', 1)->get();
        parent::$data['HouseWallMaterial'] = HouseWallMaterial::where('status', 1)->get();
        parent::$data['HouseShower'] = HouseShower::where('status', 1)->get();
        parent::$data['FoodGaz'] = FoodGaz::where('status', 1)->get();
        parent::$data['HouseRoom'] = HouseRoom::where('status', 1)->get();
        parent::$data['Furnitures'] = Furniture::where('status', 1)->get();
        parent::$data['UserOpinion'] = UserOpinion::where('status', 1)->get();
        parent::$data['Citizens'] = Citizen::where('status', 1)->get();
        parent::$data['Types'] = CustomerType::where('status', 1)->get();
        parent::$data['Jenders'] = Jender::all();
        parent::$data['Healths'] = Health::all();
        parent::$data['Relation'] = RelationType::all();

        return view('report.report', parent::$data);
    }

    //
    public function needCustomerData(Request $request)
    {

        $project_id = $request->get('project_id');

        $posts = Customer::with('gettype', 'getstate')->withCount('projects')->filter()
            ->orderBy('total', 'DESC');

        if ($project_id) {
            $posts = $posts->whereDoesntHave('projects', function ($q) use ($project_id) {
                $q->whereIn('projects.id', $project_id)->whereNull('customer_projects.deleted_at');
            });
        }


        return Datatables::of($posts)->addcolumn('action', function ($query) {
            return '<a href="' . url('customerProject2/' . $query->id) . '" id="project_count" class="btn btn-success">عرض المشاريع</a>

<label class="checkbox-inline parent-check">
                    <input type="checkbox" name="selCustomer[]" value="' . $query->id . '" class="mycheckbox">
                    <span class="label-checkbox">اختيار</span></label>';
        })->make(true);

    }


    // تعديل كشف مستفيدين

    // استخراج كشوفات المستفيدين
    public function editNeedCustomer()
    {
        parent::getDataCounters();
        parent::$data["route"] = 'apply/customer';
        parent::$data["Projects"] = Project::where('status', 1)->get();
        parent::$data['States'] = State::all();
        parent::$data['Regions'] = Region::all();
        parent::$data['HouseType'] = HouseType::where('status', 1)->get();
        parent::$data['HouseMaterial'] = HouseMaterial::where('status', 1)->get();
        parent::$data['Types'] = CustomerType::where('status', 1)->get();


        parent::$data['RegionTypes'] = RegionType::all();
        parent::$data['MainReasons'] = main_reason::all();
        parent::$data['Educations'] = Education::where('status', 1)->get();
        parent::$data['Works'] = Work::where('status', 1)->get();
        parent::$data['WorkRegion'] = WorkRegion::where('status', 1)->get();
        parent::$data['HouseOwner'] = HouseOwner::where('status', 1)->get();
        parent::$data['HouseType'] = HouseType::where('status', 1)->get();
        parent::$data['HouseWallMaterial'] = HouseWallMaterial::where('status', 1)->get();
        parent::$data['HouseShower'] = HouseShower::where('status', 1)->get();
        parent::$data['FoodGaz'] = FoodGaz::where('status', 1)->get();
        parent::$data['HouseRoom'] = HouseRoom::where('status', 1)->get();
        parent::$data['Furnitures'] = Furniture::where('status', 1)->get();
        parent::$data['UserOpinion'] = UserOpinion::where('status', 1)->get();
        parent::$data['Citizens'] = Citizen::where('status', 1)->get();
        parent::$data['Types'] = CustomerType::where('status', 1)->get();
        parent::$data['Jenders'] = Jender::all();
        parent::$data['Healths'] = Health::all();
        parent::$data['Relation'] = RelationType::all();

        return view('report.editReport', parent::$data);
    }

    //
    public function editNeedCustomerData(Request $request)
    {

        $project_id = $request->get('project_id');
        $posts = Customer::with('gettype', 'getstate')->withCount('projects')->filter()
            ->orderBy('total', 'DESC');

        if ($project_id) {

            $posts = $posts->whereDoesHave('projects', function ($q) use ($project_id) {
                $q->whereIn('projects.id', $project_id);
            });
        }


        return Datatables::of($posts)->addcolumn('action', function ($query) {
            return '<a href="' . url('customerProject2/' . $query->id) . '" id="project_count" class="btn btn-success">عرض المشاريع</a>

<label class="checkbox-inline parent-check">
                    <input type="checkbox" name="selCustomer[]" value="' . $query->id . '" class="mycheckbox">
                    <span class="label-checkbox">اختيار</span></label>';
        })->make(true);

    }

    // استخراج كشوفات ليس المستفيدين
    public function noNeedCustomer()
    {
        parent::getDataCounters();
        parent::$data["route"] = 'apply/customer';
        parent::$data["Projects"] = Project::where('status', 1)->get();
        parent::$data['States'] = State::all();
        parent::$data['Regions'] = Region::all();
        parent::$data['HouseType'] = HouseType::where('status', 1)->get();
        parent::$data['HouseMaterial'] = HouseMaterial::where('status', 1)->get();
        parent::$data['Types'] = CustomerType::where('status', 1)->get();


        parent::$data['RegionTypes'] = RegionType::all();
        parent::$data['MainReasons'] = main_reason::all();
        parent::$data['Educations'] = Education::where('status', 1)->get();
        parent::$data['Works'] = Work::where('status', 1)->get();
        parent::$data['WorkRegion'] = WorkRegion::where('status', 1)->get();
        parent::$data['HouseOwner'] = HouseOwner::where('status', 1)->get();
        parent::$data['HouseType'] = HouseType::where('status', 1)->get();
        parent::$data['HouseWallMaterial'] = HouseWallMaterial::where('status', 1)->get();
        parent::$data['HouseShower'] = HouseShower::where('status', 1)->get();
        parent::$data['FoodGaz'] = FoodGaz::where('status', 1)->get();
        parent::$data['HouseRoom'] = HouseRoom::where('status', 1)->get();
        parent::$data['Furnitures'] = Furniture::where('status', 1)->get();
        parent::$data['UserOpinion'] = UserOpinion::where('status', 1)->get();
        parent::$data['Citizens'] = Citizen::where('status', 1)->get();
        parent::$data['Types'] = CustomerType::where('status', 1)->get();
        parent::$data['Jenders'] = Jender::all();
        parent::$data['Healths'] = Health::all();
        parent::$data['Relation'] = RelationType::all();

        return view('report.noreport', parent::$data);
    }

    public function noNeedCustomerData(Request $request)
    {

        $project_id = $request->get('project_id');
        $customers = CustomerProject::where('id', '>', 0)->pluck('customer_id')->toArray();

        $posts = Customer::with('gettype', 'getstate')->withCount('projects')
            ->whereNotIn('id', $customers)
            ->filter()
            ->orderBy('total', 'DESC');

        if ($project_id) {

            $posts = $posts->whereDoesntHave('projects', function ($q) use ($project_id) {
                $q->whereIn('projects.id', $project_id);
            });
        }

        return Datatables::of($posts)->addcolumn('action', function ($query) {
            return '<a href="' . url('customerProject2/' . $query->id) . '" id="project_count" class="btn btn-success">عرض المشاريع</a>

<label class="checkbox-inline parent-check">
                    <input type="checkbox" name="selCustomer[]" value="' . $query->id . '" class="mycheckbox">
                    <span class="label-checkbox">اختيار</span></label>';
        })->make(true);

    }


    // استخراج كشوفات المستفيدين
    public function recieveHelp()
    {

        parent::getDataCounters();
        parent::$data['title'] = 'من استلم مساعدة';
        parent::$data["breadcrumb"] = "التقارير";
        parent::$data["route"] = 'apply/customer';
        parent::$data["Projects"] = Project::where('status', 1)->get();

        return view('report.recieve_help', parent::$data);

    }

    public function recieveHelpData(Request $request)
    {

        $project_id = $request->get('project_id');
        $card_no = $request->get('card_no');
        $name = $request->get('name');

        $date_from = $request->get('date_from'); ///'2017-01-01';//
        $date_to = $request->get('date_to'); //'2018-06-01';//

        return Datatables::of(CustomerProject::whereIN('project_id', Project::select('id')->where('status', 1)->get())->with('customer', 'customer.gettype', 'project')
            ->where(function ($q) use ($project_id, $date_from, $date_to) {
                if (isset($project_id))
                    $q->where('project_id', $project_id);
                if (isset($date_from)) {
                    $q->whereDate('created_at', '>=', (string)$date_from);
                }
                if (isset($date_to)) {
                    $q->whereDate('created_at', '<=', (string)$date_to);
                }
            })
            ->whereHas('customer', function ($q) use ($name, $card_no) {
                if (isset($name)) {
                    $q->where('name', 'like', "%" . $name . "%");
                }
                if (isset($card_no)) {
                    $q->where('card_no', $card_no);
                }
            })
        )->addcolumn('action', function ($query) {
            return '';
        })->make(true);

    }

    public function applyCustomer(Request $request)
    {

        $selcustomer = $request->get('selCustomer');
        $proj_id = $request->get('apply_project_id');

        if ((!isset($selcustomer)) || $proj_id == "") {
            // dd(1);
            return response(["status" => false, "message" => "يجب اختيار المشروع والمستفيدين", 401]);

        }

        $max_print_id = CustomerProject::max('print_id') + 1;
        $coupon_no = CustomerProject::where('project_id', $proj_id)->max('coupon_no');
        // $max_print_id=+1;

        $customers = Customer::whereIn('id', $selcustomer)->orderby('state_id')->get();
        //   dd($customers);die;
        if (isset($selcustomer)) {
            foreach ($customers as $customer) {
                $obj = new CustomerProject();
                $obj->project_id = $proj_id;
                $obj->customer_id = $customer->id;
                $obj->user_id = auth()->user()->id;
                $obj->tag = $request->get('tag');
                $obj->note = $request->get('note');
                $obj->print_id = $max_print_id;
                $obj->coupon_no = ++$coupon_no;
                $obj->save();
            }

            return response(["status" => true, "message" => trans('ar.created_successfully')]);
        }
    }

    public function CustomerFamily($id)
    {

        return DataTables::of(Family::with('jender', 'health', 'rel')
            ->where('customer_id', $id))
            ->addColumn('action', function ($query) {
                return '<a pull-link="Family/' . $query->id . '/delete" id="delete_family" class="btn btn-circle btn-icon-only btn-green" title="حذف" id="edit_btn"> <i class="fa fa-trash"></i> </a>';
            })
            ->make(true);
    }

    public function CustomerProjects($id)
    {
        return DataTables::of(CustomerProject::with('Project')
            ->where('customer_id', $id)
        )->make(true);
    }

    public function CustomerProjects2($id)
    {
        return view('customers.projects', ['projects' => CustomerProject::with('Project')
            ->where('customer_id', $id)->get()])->render();
    }

    public function printReport()
    {

        parent::getDataCounters();
        parent::$data['title'] = 'طباعة كشوفات التسليم';
        parent::$data["breadcrumb"] = "التقارير";
        parent::$data["route"] = 'couponPrint';
        parent::$data["Projects"] = Project::with('Sponser')->where('status', 1)->get();
        parent::$data["States"] = State::where('status', 1)->get();

        return view('report.print', parent::$data);
    }

    public function printReportData(Request $request)
    {

        $state_id = $request->get('state');
        $coupon_from = $request->get('coupon_from');
        $coupon_to = $request->get('coupon_to');
        $project = $request->get('project');
        $tag = $request->get('tag');

        $customers = CustomerProject::with('customer')
            ->whereHas('customer', function ($q) use ($state_id) {
                if (($state_id))
                    $q->where('state_id', $state_id);

            })
            ->where(function ($q) use ($coupon_from, $coupon_to, $project, $tag) {
                if (($coupon_from))
                    $q->where('coupon_no', '>=', $coupon_from);
                if (($coupon_to))
                    $q->where('coupon_no', '<=', $coupon_to);
                if (($project))
                    $q->where('project_id', $project);
                if (($tag))
                    $q->where('tag', $tag);
            });
        if (!$project)
            $customers->limit(100);

        return DataTables::of($customers)->addColumn('sign', function ($q) {
            return "";
        })
            ->make(true);

    }

    public function couponPrint(Request $request)
    {

        $state_id = $request->get('state');
        $print_id = $request->get('print_id');
        $coupon_from = $request->get('coupon_from');
        $coupon_to = $request->get('coupon_to');
        $project = $request->get('project_id');
        $address = $request->get('address');
        $date_s = $request->get('date_s');

        //  dd($project);die;

        $coupons = CustomerProject::with('customer', 'Customer.getState', 'Customer.getRegion', 'project')
            ->whereHas('customer', function ($q) use ($state_id) {
                if (isset($state_id))
                    $q->where('state_id', $state_id);

            })
            ->where(function ($q) use ($coupon_from, $coupon_to, $project) {
                if (isset($coupon_from))
                    $q->where('coupon_no', '>=', $coupon_from);
                if (isset($coupon_to))
                    $q->where('coupon_no', '<=', $coupon_to);
                if (isset($project))
                    $q->where('project_id', $project);
            })->get();

        parent::$data["Coupons"] = $coupons;
        parent::$data["address"] = $address;
        parent::$data["date_s"] = $date_s;

        //  dd($coupons);die;
        return view('report.coupon', parent::$data);

    }

    public function orphanSearch()
    {
        parent::getDataCounters();
        parent::$data['title'] = ' استخراج كشوفات ايتام';
        parent::$data["breadcrumb"] = "التقارير";
        parent::$data["route"] = 'Orphan';
        parent::$data["Projects"] = Project::where('status', 1)->get();
        parent::$data["States"] = State::where('status', 1)->get();
        parent::$data["page_name"] = "كفالة يتيم";

//        $rr = Customer::with('getstate','childs','gettype')->where('type',2)->get();
//        dd($rr);
        return view('report.yatem', parent::$data);
    }

    public function orphanSearchData(Request $request)
    {

        $state_id = $request->get('state');
        $dob_from = $request->get('dob_from');
        $dob_to = $request->get('dob_to');
        $death_from = $request->get('death_from');
        $death_to = $request->get('death_to');
        $project = $request->get('project');

        return DataTables::of(Family::with('customer', 'customer.gettype', 'customer.getstate', 'rel')
//            ->whereNotNull('death_date')
            ->whereHas('customer', function ($q) use ($death_to, $death_from, $state_id) {
                $q->where('type', 2);
                if (isset($death_from))
                    $q->whereDate('death_date', '>=', (string)$death_from);
                if (isset($death_to))
                    $q->whereDate('death_date', '<=', (string)$death_to);
                if (isset($state_id))
                    $q->where('state_id', $state_id);
            })
            ->where(function ($q) use ($dob_from, $dob_to) {
                $q->where('is_yatem', 2);
                $q->whereIn('relation', [1, 2]);
                if (isset($dob_from))
                    $q->whereDate('dob', '>=', (string)$dob_from);
                if (isset($dob_to))
                    $q->whereDate('dob', '<=', (string)$dob_to);
            })
        )->addColumn('action', function ($query) {
            return '<a href="#add_modal" data-toggle="modal" child="' . $query->id . '" class="btn btn-success btn-xs" id="new_yatem" title="اضافة كفالة"><i class="fa fa-plus"></i> </a>';

        })
            ->make(true);

    }

    public function get_citizen_data()
    {

        if (request()->ajax() and request('id_number')) {
            $citizen = Customer::where('card_no', request('id_number'))->get()->first();

            if ($citizen) {
                return response(['status' => 'fail', 'msg' => 'رقم الهوية متكرر في سجل المستفيدين  ' . '  id: ' . $citizen->id, 'id' => $citizen->id]);
            }

            $orphan = Orphan::where('card_no', request('id_number'))->get()->first();
            if ($orphan) {
                return response(['status' => 'fail', 'msg' => 'رقم الهوية متكرر في سجل الأيتام  ' . ' id:' . $orphan->id, 'id' => $orphan->id]);
            }

        }
    }

    public function state_char($char)
    {
        if ($char == 1) {
            return "GZ";
        } elseif ($char == 2) {
            return "NR";
        } elseif ($char == 3) {
            return "MS";
        } elseif ($char == 4) {
            return "KH";
        } else {
            return "RF";
        }

    }

    public function activities()
    {
        parent::$data['title'] = 'عرض جميع الاشعارات';
        parent::getDataCounters();
        parent::$data['perm'] = 10;
        parent::$data['page_name'] = 'الاشعارات';
        // parent::$data['activities']=Activity::orderBy('id','DESC')->get();

        return view("home.activities", parent::$data);
    }

    public function getactivity(Request $request)
    {
        return DataTables::of(Activity::with('admin')->latest()->limit(100)->orderBy('id', 'DESC')->filter()
        )->make(true);
    }

    public function delete_customers_from_project(Request $request)
    {
        $proj_id = $request->project_id;
        if ($proj_id == "") {
            // dd(1);
            return response(["status" => false, "message" => "يجب اختيار المشروع", 401]);
        }
        // print_r($request->get('ids'));exit();
        if ($request->get('ids'))
            CustomerProject::where('project_id', $proj_id)->whereIn('customer_id', $request->get('ids'))->delete();

        return response(["status" => true, "message" => "تمت العملية بنجاح", 200]);
    }


    public function calc($id)
    {
        $customer = Customer::find($id);
        $points = 0;


//        add family count
        if ($customer->family_count) {
            if (intval($customer->family_count) < 5) {
                $points += 4;
            } else if (intval($customer->family_count) <= 9) {
                $points += 7;
            } else {
                $points += 9;
            }
        }

//        add other family

        if ($customer->other_member == '1') {
            $points += 5;
        }

//        add child working
        if (intval($customer->child_working) == 0) {
            $points += 1;
        } else if (intval($customer->child_working) <= 2) {
            $points += 3;
        }

        if (intval($customer->child_not_working) >= 4) {
            $points += 2;
        } else {
            $points += 1;
        }

        if (intval($customer->child_school) >= 5) {
            $points += 3;
        } else if (intval($customer->child_school) >= 3) {
            $points += 2;
        } else {
            $points += 1;
        }

        if (intval($customer->child_university) >= 4) {
            $points += 4;
        } elseif (intval($customer->child_university) >= 2) {
            $points += 3;
        } elseif (intval($customer->child_university) >= 1) {
            $points += 2;
        }


        if (intval($customer->child_special) >= 3) {
            $points += 5;
        } elseif (intval($customer->child_special) >= 1) {
            $points += 3;
        }

        print_r($points);
        exit();

    }
}