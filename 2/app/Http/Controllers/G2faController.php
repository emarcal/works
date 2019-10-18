<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use App\Log;
use App\LogUser;



class G2faController extends Controller
{
    public function activate(Request $request){
        
        $id = $request->id;
        $username = $request->username;

        $change = User::where('id', $id)->first();
        $change->g2fa_status = "1";
        $change->save();
            // History
        $ip = request()->server('HTTP_CF_CONNECTING_IP');
        $log = Log::create([
            'moderator' => Auth::user()->id,
            'user' => $id,
            'description' => "Moderator '".Auth::user()->username."' changed the G2FA Status '".$username."' to 'activated'.",
            'date' => time(),
            'ip' => $ip
        ]);
        // History

        return redirect('/user/edit/'.$id);
    }
    public function disable(Request $request){
        
        $id = $request->id;
        $username = $request->username;

        $change = User::where('id', $id)->first();
        $change->g2fa_status = "0";
        $change->save();
            // History
        $ip = request()->server('HTTP_CF_CONNECTING_IP');
        $log = Log::create([
            'moderator' => Auth::user()->id,
            'user' => $id,
            'description' => "Moderator '".Auth::user()->username."' changed the G2FA Status '".$username."' to 'disabled'.",
            'date' => time(),
            'ip' => $ip
        ]);
        // History

        return redirect('/user/edit/'.$id);
    }
    
}
