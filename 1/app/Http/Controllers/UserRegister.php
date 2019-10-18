<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserRegister extends Controller
{
    public function checkUser(Request $request)
    {   
        $type = "email";

        if($request->t == "u") {
            $type = "cpf";
        }

        
        $user = User::where($type,$request->v)->first();

        if($user) {
            return "1";
        } else {
            return "0";
        }

    }
}
