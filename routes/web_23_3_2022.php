<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//define('admin_url','layouts.');


Route::get('/', function () {

    return redirect()->route('login');
});

Route::get('download', 'HomeController@download')->name('download');

Auth::routes();

Route::get('/home', 'DashboardController@index')->name('home');

Route::get('ProjectSponser', 'ProjectSponserController@index');
Route::post('ProjectSponser', 'ProjectSponserController@store');
Route::get('ProjectSponser/All', 'ProjectSponserController@getAll');
Route::get('ProjectSponser/delete/{id}', 'ProjectSponserController@delete');
Route::get('ProjectSponser/{id}/edit', 'ProjectSponserController@edit');
Route::post('ProjectSponser/update/{id}', 'ProjectSponserController@update');

Route::get('Project', 'ProjectController@index');
Route::post('Project', 'ProjectController@store');
Route::get('Project/All', 'ProjectController@getAll');
Route::get('Project/delete/{id}', 'ProjectController@delete');
Route::get('Project/{id}/edit', 'ProjectController@edit');
Route::post('Project/update/{id}', 'ProjectController@update');


Route::get('Education', 'EducationController@index');
Route::post('Education', 'EducationController@store');
Route::get('Education/All', 'EducationController@getAll');
Route::get('Education/delete/{id}', 'EducationController@delete');
Route::get('Education/{id}/edit', 'EducationController@edit');
Route::post('Education/update/{id}', 'EducationController@update');


Route::get('FoodGaz', 'FoodGazController@index');
Route::post('FoodGaz', 'FoodGazController@store');
Route::get('FoodGaz/All', 'FoodGazController@getAll');
Route::get('FoodGaz/delete/{id}', 'FoodGazController@delete');
Route::get('FoodGaz/{id}/edit', 'FoodGazController@edit');
Route::post('FoodGaz/update/{id}', 'FoodGazController@update');

Route::get('Furniture', 'FurnitureController@index');
Route::post('Furniture', 'FurnitureController@store');
Route::get('Furniture/All', 'FurnitureController@getAll');
Route::get('Furniture/delete/{id}', 'FurnitureController@delete');
Route::get('Furniture/{id}/edit', 'FurnitureController@edit');
Route::post('Furniture/update/{id}', 'FurnitureController@update');

Route::get('HelpType', 'HelpTypeController@index');
Route::post('HelpType', 'HelpTypeController@store');
Route::get('HelpType/All', 'HelpTypeController@getAll');
Route::get('HelpType/delete/{id}', 'HelpTypeController@delete');
Route::get('HelpType/{id}/edit', 'HelpTypeController@edit');
Route::post('HelpType/update/{id}', 'HelpTypeController@update');

Route::get('HouseMaterial', 'HouseMaterialController@index');
Route::post('HouseMaterial', 'HouseMaterialController@store');
Route::get('HouseMaterial/All', 'HouseMaterialController@getAll');
Route::get('HouseMaterial/delete/{id}', 'HouseMaterialController@delete');
Route::get('HouseMaterial/{id}/edit', 'HouseMaterialController@edit');
Route::post('HouseMaterial/update/{id}', 'HouseMaterialController@update');

Route::get('HouseOwner', 'HouseOwnerController@index');
Route::post('HouseOwner', 'HouseOwnerController@store');
Route::get('HouseOwner/All', 'HouseOwnerController@getAll');
Route::get('HouseOwner/delete/{id}', 'HouseOwnerController@delete');
Route::get('HouseOwner/{id}/edit', 'HouseOwnerController@edit');
Route::post('HouseOwner/update/{id}', 'HouseOwnerController@update');

Route::get('SocialStatus', 'SocialStatusController@index');
Route::post('SocialStatus', 'SocialStatusController@store');
Route::get('SocialStatus/All', 'SocialStatusController@getAll');
Route::get('SocialStatus/delete/{id}', 'SocialStatusController@delete');
Route::get('SocialStatus/{id}/edit', 'SocialStatusController@edit');
Route::post('SocialStatus/update/{id}', 'SocialStatusController@update');

Route::get('Qualification', 'QualificationController@index');
Route::post('Qualification', 'QualificationController@store');
Route::get('Qualification/All', 'QualificationController@getAll');
Route::get('Qualification/delete/{id}', 'QualificationController@delete');
Route::get('Qualification/{id}/edit', 'QualificationController@edit');
Route::post('Qualification/update/{id}', 'QualificationController@update');

Route::get('outcomes', 'OutcomeController@index');
Route::post('outcomes', 'OutcomeController@store');
Route::get('outcomes/All', 'OutcomeController@getAll');
Route::get('outcomes/delete/{id}', 'OutcomeController@delete');
Route::get('outcomes/{id}/edit', 'OutcomeController@edit');
Route::post('outcomes/update/{id}', 'OutcomeController@update');

Route::get('HouseType', 'HouseTypeController@index');
Route::post('HouseType', 'HouseTypeController@store');
Route::get('HouseType/All', 'HouseTypeController@getAll');
Route::get('HouseType/delete/{id}', 'HouseTypeController@delete');
Route::get('HouseType/{id}/edit', 'HouseTypeController@edit');
Route::post('HouseType/update/{id}', 'HouseTypeController@update');

Route::get('HouseRoom', 'HouseRoomController@index');
Route::post('HouseRoom', 'HouseRoomController@store');
Route::get('HouseRoom/All', 'HouseRoomController@getAll');
Route::get('HouseRoom/delete/{id}', 'HouseRoomController@delete');
Route::get('HouseRoom/{id}/edit', 'HouseRoomController@edit');
Route::post('HouseRoom/update/{id}', 'HouseRoomController@update');

Route::get('HouseWall', 'HouseWallMaterialController@index');
Route::post('HouseWall', 'HouseWallMaterialController@store');
Route::get('HouseWall/All', 'HouseWallMaterialController@getAll');
Route::get('HouseWall/delete/{id}', 'HouseWallMaterialController@delete');
Route::get('HouseWall/{id}/edit', 'HouseWallMaterialController@edit');
Route::post('HouseWall/update/{id}', 'HouseWallMaterialController@update');

Route::get('MainReason', 'MainReasonController@index');
Route::post('MainReason', 'MainReasonController@store');
Route::get('MainReason/All', 'MainReasonController@getAll');
Route::get('MainReason/delete/{id}', 'MainReasonController@delete');
Route::get('MainReason/{id}/edit', 'MainReasonController@edit');
Route::post('MainReason/update/{id}', 'MainReasonController@update');

Route::get('State', 'StateController@index');
Route::post('State', 'StateController@store');
Route::get('State/All', 'StateController@getAll');
Route::get('State/delete/{id}', 'StateController@delete');
Route::get('State/{id}/edit', 'StateController@edit');
Route::post('State/update/{id}', 'StateController@update');

Route::get('Region', 'RegionController@index');
Route::post('Region', 'RegionController@store');
Route::get('Region/All', 'RegionController@getAll');
Route::get('Region/delete/{id}', 'RegionController@delete');
Route::get('Region/{id}/edit', 'RegionController@edit');
Route::post('Region/update/{id}', 'RegionController@update');
Route::get('getRegion/{id}', 'RegionController@getRegion');

Route::get('UserOpinion', 'UserOpinionController@index');
Route::post('UserOpinion', 'UserOpinionController@store');
Route::get('UserOpinion/All', 'UserOpinionController@getAll');
Route::get('UserOpinion/delete/{id}', 'UserOpinionController@delete');
Route::get('UserOpinion/{id}/edit', 'UserOpinionController@edit');
Route::post('UserOpinion/update/{id}', 'UserOpinionController@update');

Route::get('Work', 'WorkController@index');
Route::post('Work', 'WorkController@store');
Route::get('Work/All', 'WorkController@getAll');
Route::get('Work/delete/{id}', 'WorkController@delete');
Route::get('Work/{id}/edit', 'WorkController@edit');
Route::post('Work/update/{id}', 'WorkController@update');

Route::get('WorkRegion', 'WorkRegionController@index');
Route::post('WorkRegion', 'WorkRegionController@store');
Route::get('WorkRegion/All', 'WorkRegionController@getAll');
Route::get('WorkRegion/delete/{id}', 'WorkRegionController@delete');
Route::get('WorkRegion/{id}/edit', 'WorkRegionController@edit');
Route::post('WorkRegion/update/{id}', 'WorkRegionController@update');

Route::get('RegionType', 'RegionTypeController@index');
Route::post('RegionType', 'RegionTypeController@store');
Route::get('RegionType/All', 'RegionTypeController@getAll');
Route::get('RegionType/delete/{id}', 'RegionTypeController@delete');
Route::get('RegionType/{id}/edit', 'RegionTypeController@edit');
Route::post('RegionType/update/{id}', 'RegionTypeController@update');

Route::get('HouseShower', 'HouseShowerController@index');
Route::post('HouseShower', 'HouseShowerController@store');
Route::get('HouseShower/All', 'HouseShowerController@getAll');
Route::get('HouseShower/delete/{id}', 'HouseShowerController@delete');
Route::get('HouseShower/{id}/edit', 'HouseShowerController@edit');
Route::post('HouseShower/update/{id}', 'HouseShowerController@update');

Route::get('User', 'UserController@index');
Route::post('User', 'UserController@store');
//Route::get('User/create', 'UserController@create');
Route::get('User/All', 'UserController@getAll');
Route::get('User/delete/{id}', 'UserController@delete');
Route::get('User/{id}/edit', 'UserController@edit');
Route::post('User/update/{id}', 'UserController@update');

Route::get('Roles/list', 'RoleController@index');
Route::get('Roles', 'RoleController@create');
Route::post('Roles', 'RoleController@store');
Route::get('Roles/All', 'RoleController@getAll');
Route::get('Roles/update/{id}', 'RoleController@edit');
Route::post('Roles/update/{id}', 'RoleController@update');
Route::get('Roles/delete/{id}', 'RoleController@delete');


// End Usage
Route::get('Customer/v1/create', 'CustomerController@create_1'); 
Route::get('Customer/v1/{id}/edit', 'CustomerController@edit_1'); 
Route::get('Customer/v1/{id}/show', 'CustomerController@show_1'); 
Route::post('customer/personal/{id?}', 'CustomerController@personal')->name('customers.personal'); 
Route::post('customer/father-info/{id?}', 'CustomerController@fatherInfo')->name('customers.fatherInfo'); 
Route::post('customer/family-composition/{id?}', 'CustomerController@familyComposition')->name('customers.familyComposition'); 
Route::post('customer/work-info/{id?}', 'CustomerController@workInfo')->name('customers.workInfo'); 
Route::post('customer/housing-data/{id?}', 'CustomerController@housingData')->name('customers.housingData'); 
Route::post('customer/researcher/{id?}', 'CustomerController@researcher')->name('customers.researcher'); 
Route::post('customer/family-composition-details/{id?}', 'CustomerController@familyCompositionDetails')->name('customers.familyCompositionDetails'); 
Route::post('customer/attachments/{id?}', 'CustomerController@attachments')->name('customers.attachments'); 


Route::get('Customer', 'CustomerController@index'); 
Route::get('ApprovalCustomer', 'CustomerController@index_not_approval');
Route::get('Customer/create', 'CustomerController@create');
Route::post('Customer', 'CustomerController@store');
Route::get('Customer/All', 'CustomerController@getall');
Route::get('Customer/All_1', 'CustomerController@getall_1');
Route::get('Customer/{id}/edit', 'CustomerController@edit');
Route::get('Customer/{id}/show', 'CustomerController@show');
Route::post('Customer/update', 'CustomerController@update');
Route::post('Customer/send_message', 'CustomerController@send_message');
Route::get('Customer/delete/{id}', 'CustomerController@delete');
Route::post('Customer/reject/{id}', 'CustomerController@reject');
Route::post('Customer/approve_create/{id}', 'CustomerController@approve_create');
Route::post('Customer/approve_update/{id}', 'CustomerController@approve_update');
Route::post('Customer/approve_delete/{id}', 'CustomerController@approve_delete');
Route::get('Customer/recovery/{id}', 'CustomerController@recovery');
Route::get('Customer/calculatePoint/{id}', function ($id) {
    \App\Models\Customer::find($id)->calculatePoint();
});
//Reports
Route::get('Report/NeedCustomer', 'CustomerController@needCustomer');
Route::get('Report/NeedCustomerData', 'CustomerController@needCustomerData');

Route::get('Report/NoNeedCustomer', 'CustomerController@noNeedCustomer');
Route::get('Report/NoNeedCustomerData', 'CustomerController@noNeedCustomerData');

Route::post('apply/customer', 'CustomerController@applyCustomer');
Route::get('Family/{id}', 'CustomerController@CustomerFamily');
Route::get('Family/{id}/delete', 'FamilyController@delete');
Route::post('Family/{id}/update', 'FamilyController@delete');
Route::get('printReport', 'CustomerController@printReport');
Route::get('printReportData', 'CustomerController@printReportData');
Route::get('coupon', 'CustomerController@coupon');
Route::post('couponPrint', 'CustomerController@couponPrint');
Route::get('recieveHelpReport', 'CustomerController@recieveHelp');
Route::get('recieveHelpData', 'CustomerController@recieveHelpData');
Route::get('customerProject/{id}', 'CustomerController@CustomerProjects');
Route::get('customerProject2/{id}', 'CustomerController@CustomerProjects2');

Route::get('/get-citizen-data','CustomerController@get_citizen_data')->name('get-citizen-data');
//orphan
Route::get('OrphanSearch', 'CustomerController@orphanSearch');
Route::get('OrphanSearchData', 'CustomerController@orphanSearchData');
Route::post('Orphan', 'YatemController@store');
Route::get('Orphan', 'YatemController@index');
Route::get('ApprovalOrphan', 'YatemController@index_approval');
Route::get('Orphan/All', 'YatemController@getall');
Route::get('Orphan/All_1', 'YatemController@getall_1');
Route::get('Orphan/{id}/edit', 'YatemController@edit');
Route::post('Orphan/update/{id}', 'YatemController@update');
Route::get('OrphanSalary', 'YatemController@createsalary');
Route::post('OrphanSalary', 'YatemController@salaryStore');
Route::get('Orphan/details/{id}', 'YatemController@details');
Route::get('OrphanSalary/{id}', 'YatemController@getOrphanSalary');
Route::get('Orphan/v1/create', 'YatemController@create_1');
Route::get('Orphan/delete/{id}', 'YatemController@delete');

Route::get('Orphan/v1/{id}/edit', 'YatemController@edit_1');
Route::get('Orphan/v1/{id}/show', 'YatemController@show_1');

Route::post('Orphan/reject/{id}', 'YatemController@reject');
Route::post('Orphan/approve_create/{id}', 'YatemController@approve_create');
Route::post('Orphan/approve_update/{id}', 'YatemController@approve_update');
Route::post('Orphan/approve_delete/{id}', 'YatemController@approve_delete');
Route::get('Orphan/recovery/{id}', 'YatemController@recovery');
Route::post('yatem/personal/{id?}', 'YatemController@personal')->name('yatem.personal'); 
Route::post('yatem/information_of_orphan/{id?}', 'YatemController@information_of_orphan')->name('yatem.information_of_orphan'); 
Route::post('yatem/father-info/{id?}', 'YatemController@fatherInfo')->name('yatem.fatherInfo'); 
Route::post('yatem/information_guardian/{id?}', 'YatemController@information_guardian')->name('yatem.information_guardian'); 
Route::post('yatem/family-composition/{id?}', 'YatemController@familyComposition')->name('yatem.familyComposition'); 
Route::post('yatem/family-educational-status/{id?}', 'YatemController@familyEducationalStatus')->name('yatem.familyEducationalStatus'); 
Route::post('yatem/child-psychological-health-condition/{id?}', 'YatemController@childPsychologicalHealthCondition')->name('yatem.childPsychologicalHealthCondition'); 
Route::post('yatem/work-info/{id?}', 'YatemController@workInfo')->name('yatem.workInfo'); 
Route::post('yatem/housing-data/{id?}', 'YatemController@housingData')->name('yatem.housingData'); 
Route::post('yatem/researcher/{id?}', 'YatemController@researcher')->name('yatem.researcher'); 
Route::post('yatem/family-composition-details/{id?}', 'YatemController@familyCompositionDetails')->name('yatem.familyCompositionDetails'); 
Route::post('yatem/attachments/{id?}', 'YatemController@attachments')->name('yatem.attachments'); 

Route::post('yatem/orphan_guarantees/{id?}', 'YatemController@orphan_guarantees')->name('yatem.orphan_guarantees');

//
Route::get('logout', 'UserController@logout');
Route::get('tree', 'Controller@treeView');
Route::get('getChild/{id?}', 'Controller@treeView');
Route::get('setting', 'SettingController@index');
Route::post('setting', 'SettingController@store');
Route::get('usertest', 'UserController@testUser');



// Widowed
Route::get('Widowed/v1/create', 'WidowedController@create_1');
Route::get('Widowed/v1/{id}/edit', 'WidowedController@edit_1');
Route::get('Widowed/v1/{id}/show', 'WidowedController@show_1');
Route::post('widowed/personal/{id?}', 'WidowedController@personal')->name('Widowed.personal');
Route::post('widowed/father-info/{id?}', 'WidowedController@fatherInfo')->name('Widowed.fatherInfo');
Route::post('widowed/family-composition/{id?}', 'WidowedController@familyComposition')->name('Widowed.familyComposition');
Route::post('widowed/work-info/{id?}', 'WidowedController@workInfo')->name('Widowed.workInfo');
Route::post('widowed/housing-data/{id?}', 'WidowedController@housingData')->name('Widowed.housingData');
Route::post('widowed/researcher/{id?}', 'WidowedController@researcher')->name('Widowed.researcher');
Route::post('widowed/family-composition-details/{id?}', 'WidowedController@familyCompositionDetails')->name('Widowed.familyCompositionDetails');
Route::post('widowed/attachments/{id?}', 'WidowedController@attachments')->name('Widowed.attachments');


Route::get('Widowed', 'WidowedController@index'); 
Route::get('ApprovalWidowed', 'WidowedController@index_approval');
Route::get('Widowed/create', 'WidowedController@create');
Route::post('Widowed', 'WidowedController@store');
Route::get('Widowed/All', 'WidowedController@getall');
Route::get('Widowed/All_1', 'WidowedController@getall_1');
Route::get('Widowed/{id}/edit', 'WidowedController@edit');
Route::get('Widowed/{id}/show', 'WidowedController@show');
Route::post('Widowed/update', 'WidowedController@update');
Route::get('Widowed/delete/{id}', 'WidowedController@delete');
Route::post('Widowed/reject/{id}', 'WidowedController@reject');
Route::post('Widowed/approve_create/{id}', 'WidowedController@approve_create');
Route::post('Widowed/approve_update/{id}', 'WidowedController@approve_update');
Route::post('Widowed/approve_delete/{id}', 'WidowedController@approve_delete');
Route::get('Widowed/recovery/{id}', 'WidowedController@recovery');
Route::get('Widowed/calculatePoint/{id}', function ($id) {
    \App\Models\Customer::find($id)->calculatePoint();
});

Route::post('getState', 'WidowedController@getState');

