<?php

namespace App\Http\Controllers\Auth;

use App\G2fa;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Http\Request;

class G2faController extends Controller
{
    public function index()
    {
        $phpg2fa = new G2fa();
        return view('verifykey', compact('phpg2fa'));
    }

    public function login(Request $request)
    {
        $phpg2fa = new G2fa();
        $ga = new $phpg2fa;

        $secret = Auth::user()->g2fa_key;

        // code da caixa de texto
        $code = $request->code;

        // VERIFICAR SE O CODE NO POST = CODE NA GOOGLE

        $checkResult = $ga->verifyCode($secret, $code, 2);

        if ($checkResult) {
             $id = Auth::user()->id;

            $change = User::where('id', $id)->first();
            $change->g2fa_login = "1";
            $change->save();
    
            return redirect('me/dashboard');
            

        } else {
            return redirect('loginkey')->with('error2fa', 'error');

        }

       
    }
    public function verify(Request $request)
    {
        $phpg2fa = new G2fa();
        $ga = new $phpg2fa;


        $secret = Auth::user()->g2fa_key;

        // code da caixa de texto
        $code = $request->code;

        // VERIFICAR SE O CODE NO POST = CODE NA GOOGLE

        $checkResult = $ga->verifyCode($secret, $code, 2);

        if ($checkResult) {
            $id = Auth::user()->id;
            $user = User::where('id', $id)->first();
            $user->g2fa_status = "1";
            $user->g2fa_login = "1";
            $user->save();
            return redirect('me/account')->with('success2fa_enabled', 'success');

        } else {
            // return fail. mostra mensagem de erro
            $id = Auth::user()->id;
            $user = User::where('id', $id)->first();
            $user->g2fa_key = "";
            $user->g2fa_login = "1";
            $user->save();

            return redirect('fail2fa');

        }

    }
    public function disable2fa(Request $request)
    {

        $phpg2fa = new G2fa();
        $ga = new $phpg2fa;


        $secret = Auth::user()->g2fa_key;

        // code da caixa de texto
        $code = $request->code;

        // VERIFICAR SE O CODE NO POST = CODE NA GOOGLE

        $checkResult = $ga->verifyCode($secret, $code, 2);

        if ($checkResult) {

            $id = Auth::user()->id;
            
            $user = User::where('id', $id)->first();
            $user->g2fa_status = "0";
            $user->g2fa_key = "";
            $user->g2fa_login = "1";
            $user->save();
            
            return redirect('me/account')->with('success2fa_disabled', 'success');

        } else {

            // return fail. mostra mensagem de erro

            return redirect('me/account')->with('error2fa', 'fail');
        }
    }
    public function failverify()
    {

        $id = Auth::user()->id;

        $change = User::where('id', $id)->first();
        $change->g2fa_status = "0";
        $change->g2fa_key = "";
        $change->save();

        return redirect('me/account')->with('error2fa', 'fail');
    }
    
}
