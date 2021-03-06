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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


Route::group([
	'namespace'  => 'Api',
	'prefix' 	 => 'classroom',
	'middleware' => 'auth:api'
], function () {

	Route::get('/list', 'ClassroomController@getList');
	Route::get('/detail/{id}', 'ClassroomController@getDetail');
	Route::get('/subscribe/{id}', 'ClassroomController@getSubscribe');

});

Route::group([
	'namespace'  => 'Api',
	'prefix' 	 => 'experiment',
	'middleware' => 'auth:api'
], function () {

	Route::get('/detail/{id}', 'ExperimentController@getDetail');

	Route::get('/groups/{id}', 'ExperimentController@getGroups');

	Route::post('/create', 'ExperimentController@postCreateExperiment');	

	Route::post('/sample/{id}/create', 'ExperimentController@postCreateSample');

	Route::get('/subscribe/{id}', 'ExperimentController@getSubscribe');

});

Route::group([
	'namespace' => 'Api',
	'prefix' => 'experiment_group'
], function () {

	Route::get('/subscribe/{id}', 'ExperimentGroupController@getSubscribe');

});