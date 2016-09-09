<?php

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');
header('Access-Control-Allow-Credentials: true');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post('/auth/api_login', 'Auth\LoginController@apiLogin');

Route::get('/home', 'HomeController@index');

Route::group([
	'prefix' => 'admin',
	'namespace' => 'Admin'
], function () {

	Route::get('/', 'DashboardController');
	Route::get('/users', 'UsersController');
	Route::get('/classrooms', 'ClassroomsController');
	Route::get('/experiments', 'ExperimentsController');
	Route::get('/samples', 'SamplesController');
	Route::get('/oauth', 'OAuthController');

});


Route::group([
	'prefix' => 'instructor',
	'namespace' => 'Instructor'
], function () {

	Route::get('/', 'DashboardController');
	Route::get('/experiments', 'ExperimentsController');

});