<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('orphan', 'Api\OrphanController@index'); // new customer
Route::post('orphan/personal/{id?}', 'Api\OrphanController@personal'); // new customer
Route::post('orphan/offline_save', 'Api\OrphanController@offline_save'); // new customer
Route::get('orphan/{id}','Api\OrphanController@show');





