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