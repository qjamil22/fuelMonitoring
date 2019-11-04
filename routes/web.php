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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/admin', 'AdminController@index');
Route::get('/home', 'MemberController@index');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/sensor', 'HomeController@sensor')->name('sensor');
Route::get('/log', 'HomeController@log')->name('log');
Route::post('/fms_log', 'HomeController@fms_log')->name('fms_log');

// Route::get('/fill_level_logs', 'fuelMonitoring@getlogs')->name('fill_level_logs');


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});

// Route::post('/fuelMonitoring', 'fuelMonitoringController@store')->name('fuelMonitoring');

Route::post('/create', 'fuelMonitoringController@store')->name('create');


// Route::get('/show', 'fuelMonitoringController@show');
