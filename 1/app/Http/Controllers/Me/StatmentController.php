<?php

namespace App\Http\Controllers\Me;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Statment;


class StatmentController extends Controller
{
    public function index(){
        $statments = Statment::where('status','1')->orderBy('created_at','desc')->get();
        return view('me.statments',compact('statments'));

    }
}
