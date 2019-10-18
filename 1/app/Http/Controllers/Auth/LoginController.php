<?php

namespace App\Http\Controllers\Auth;

use App\Doc;
use App\Http\Controllers\Controller;
use App\LoginHistory;
use App\User;
use Auth;
use File;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo()
    {
        $id = Auth::user()->id;
        $status = Auth::user()->status;
        $g2fa_status = Auth::user()->g2fa_status;
        if ($status == "0") {
            return ('/logout');
        }
        if (empty($status)) {
            $update = User::where('id', $id)->first();
            Auth::user()->status = "1";
            Auth::user()->save();
        }
        
        if (empty(Auth::user()->g2fa_status) || Auth::user()->g2fa_status == "0") {
            return url('/me/dashboard');
        } else {
            return url('/loginkey');
        }

        


    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated(Request $request, $user)
    {

        @$user_id = Auth::user()->id;
        @$last_date = Auth::user()->last_login_at;
        @$last_ip = Auth::user()->last_login_ip;

        session()->put('last_login_at', $last_date);
        session()->put('last_login_ip', $last_ip);

        $current_ip = request()->server('HTTP_CF_CONNECTING_IP');

        if (!empty($user_id)) {
            @$user->update([
                'last_login_at' => time(),
                'last_login_ip' => $current_ip,
            ]);
            // Save Login
            $save = LoginHistory::create([
                'ip' => $current_ip,
                'user_id' => $user_id,
                'status' => '1',
                'login_date' => time(),
            ]);
        }

        // Criar Row caso não exista
        $check = Doc::where('user', Auth::user()->id)->count();
        if ($check <= 0) {
            $doc = Doc::create([
                'user' =>  Auth::user()->id,
                'status_id' => 'new',
                'status_id_verse' => 'new',
                'status_address' => 'new',
            ]);
        } 

         // Meter status em new se os campos no DB estiverem vazios
         $getdoc1 = Doc::where('user', Auth::user()->id)->first();

         if ($getdoc1->doc_id == "" || $getdoc1->doc_id == null) {
             $getdoc1->status_id = 'new';
         }
 
         if ($getdoc1->doc_id_verse == "" || $getdoc1->doc_id_verse == null) {
 
             $getdoc1->status_id_verse = 'new';
         }
 
         if ($getdoc1->doc_address == "" || $getdoc1->doc_address == null) {
 
             $getdoc1->status_address = 'new';
         }
         
         $getdoc1->save();

    
        // Criar Pasta caso não exista
        $file = "/var/www/storage/" . Auth::user()->id;
        if (!is_dir($file)) {
            $folder = Auth::user()->id;
            $path = '/var/www/storage/' . $folder . '/';
            File::makeDirectory($path, 0777, true, true);
        } 

    }
    public function logout(Request $request)
    {
        $check = Auth::user()->status;
        $check_reset = Auth::user()->temp_reset;

        if ($check_reset == 1) {

            $update = User::where('id', Auth::user()->id)->first();
            $update->temp_reset = "0";
            $update->save();

            $this->guard()->logout();
            $request->session()->invalidate();
            return $this->loggedOut($request) ?: redirect('/login')->with('password_message', 'password_chenged');

        }
        if ($check == 0) {

            $this->guard()->logout();
            $request->session()->invalidate();
            return $this->loggedOut($request) ?: redirect('/')->with('message', 'blocked_account');

        } else {
            $id = Auth::user()->id;
            $status = Auth::user()->g2fa_login;
            if ($status == "1") {
                $change = User::where('id', $id)->first();
                $change->g2fa_login = "0";
                $change->save();
            }

            $this->guard()->logout();
            $request->session()->invalidate();
            return $this->loggedOut($request) ?: redirect('/');

        }

    }
}
