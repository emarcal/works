<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Closure;

class QrCode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $g2fa_login = Auth::user()->g2fa_login;
        $g2fa_status = Auth::user()->g2fa_status;

        
      
        if($g2fa_status == 0){
            return $next($request);
            
        }else{
            
        }  if($g2fa_login == 0){
            return redirect ('/loginkey');
            
        }else{
            return $next($request);
        }

    }
}
