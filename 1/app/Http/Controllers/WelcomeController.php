<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function changesuccess(){
        return view('changesuccess');
    }
    public function changeerror(){
        return view('changeerror');
    }
}
