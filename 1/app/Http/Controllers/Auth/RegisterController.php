<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Doc;
use Storage;
use File;
use Fylesystem;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/me/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'new_email' => 'string|max:255',
            'cpf' => 'string|max:255',
            'birth' => 'string|max:255',
            'status' => 'string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'last_login_at' => 'string|max:255',
            'last_login_ip' => 'string|max:255',
            'g2fa_status' => 'string|max:255',
            'g2fa_key' => 'string|max:255',
            'email_verified_at' => 'string|max:255',
            'temp_reset' => 'string|max:255',
            'verified' => 'string|max:255',
        ]);
    }


        /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // Create User
        $register = User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'role_id' => 2,
            'birth' => $data['birth'],
            'cpf' => $data['cpf'],
            'email' => strtolower($data['email']),
            'new_email' => '',
            'status' => '1',
            'password' => bcrypt($data['password']),
            'email_verified_at' => '2019-06-21 12:32:17',
            'last_login_at' => '',
            'last_login_ip' => '',
            'g2fa_status' => '0',
            'g2fa_key' => '',
            'temp_reset' => '0',
            'verified' => '0',
        ]);

        // Get last User ID
        $id = User::latest()->first()->id;
        //Save 
        $current_ip = request()->server('HTTP_CF_CONNECTING_IP');
        $update = User::where('id',  $id)->first();
        $update->last_login_at = time();
        $update->last_login_ip = $current_ip;
        $update->save();

        
        // Create Doc row
        $check = Doc::where('user',$id)->count();
        if($check > 0){
            
        }else{
          // Create Doc row
           $doc = Doc::create([
               'user' => $id,
               'status_id' => 'new',
               'status_id_verse' => 'new',
               'status_address' => 'new'
           ]);
        }
        // Criar Pasta caso não exista
        $file = "/var/www/storage/".$id;
        if(is_dir($file)){
            
        }else{
           $folder = $id;
           $path = '/var/www/storage/' . $folder . '/'; 
           File::makeDirectory($path, 0777, true, true);
        }
        return $register;
     
    }
}




