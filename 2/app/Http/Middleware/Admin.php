<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Admin as Middleware;


class Admin extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not Admind.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if(empty(\Auth::user()->id)){
            return "/";
        }else{
            if(\Auth::user()->username == "admin"){
                return redirect()->route('logout');
            }else{
                return $next($request); 
            }
        }
    }
}
