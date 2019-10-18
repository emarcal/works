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
    return redirect('/login');
});
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();
Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('admin');
Route::get('/dashboard', 'DashboardController@index')->name('index')->middleware('admin');
Route::get('/user/edit/{id}', 'UserController@edit')->name('edit')->middleware('admin');
Route::get('/users', 'UserController@users')->name('users')->middleware('admin');
Route::get('/user/show/{id}', 'UserController@show')->name('show')->middleware('admin');
Route::get('/user/verify/{id}', 'UserController@verify')->name('verify')->middleware('admin');
Route::get('/home', function () {
    return redirect('/dashboard');
});

    




Route::post('userupdate', [
    'uses' => 'UserController@userupdate'
]);
Route::post('changepassword', [
    'uses' => 'UserController@changepassword'
]);
Route::post('docupdate', [
    'uses' => 'UserController@docupdate'
]);

Route::post('activate', [
    'uses' => 'G2faController@activate'
]);
Route::post('disable', [
    'uses' => 'G2faController@disable'
]);

Auth::routes();





Route::get('storage/{filename}', function ($filename)
{
    $path = storage_path('' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});
