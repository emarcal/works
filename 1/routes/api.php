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
/* --------------------------------------------------------------------------- */
Route::group(['middleware' => 'auth.basic'], function () {
/* --------------------------------------------------------------------------- */
// get list of users
Route::get('users','Api\UserController@index');
// get specific user
Route::get('user/{id}','Api\UserController@show');

Route::get('suser/{sk}','Api\UserController@search');
// create new user
Route::post('user/new','Api\UserController@store');
// update existing user
Route::post('user/edit/{id}','Api\UserController@edit');
// delete a user
Route::delete('user/delete/{id}','Api\UserController@destroy');
/* --------------------------------------------------------------------------- */
// get list of users
Route::get('permissions','Api\PermissionController@index');
// get specific user
Route::get('permission/{id}','Api\PermissionController@show');
// search new user
Route::get('spermission/{sk}','Api\PermissionController@search');
// create new user
Route::post('permission/new','Api\PermissionController@store');
// update existing user
Route::post('permission/edit/{id}','Api\PermissionController@edit');
// delete a user
Route::delete('permission/delete/{id}','Api\PermissionController@destroy');
/* --------------------------------------------------------------------------- */
// get list of roles
Route::get('roles','Api\RoleController@index');
// get specific role
Route::get('role/{id}','Api\RoleController@show');

Route::get('srole/{sk}','Api\RoleController@search');
// create new role
Route::post('role/new','Api\RoleController@store');
// update existing role
Route::post('role/edit/{id}','Api\RoleController@edit');
// delete a role
Route::delete('role/delete/{id}','Api\RoleController@destroy');
/* --------------------------------------------------------------------------- */
// get list of inactives
Route::get('inactives','Api\InactiveController@index');
// get specific inactive
Route::get('inactive/{id}','Api\InactiveController@show');

Route::get('sinactive/{sk}','Api\InactiveController@search');
// create new inactive
Route::post('inactive/new','Api\InactiveController@store');
// update existing inactive
Route::post('inactive/edit/{id}','Api\InactiveController@edit');
// delete a inactive
Route::delete('inactive/delete/{id}','Api\InactiveController@destroy');
/* --------------------------------------------------------------------------- */
// get list of logs
Route::get('logs','Api\HistoryController@index');
// get specific log
Route::get('log/{id}','Api\HistoryController@show');

Route::get('slog/{sk}','Api\HistoryController@search');
// create new log
Route::post('log/new','Api\HistoryController@store');
// update existing log
Route::post('log/edit/{id}','Api\HistoryController@edit');
// delete a log
Route::delete('log/delete/{id}','Api\HistoryController@destroy');

});



