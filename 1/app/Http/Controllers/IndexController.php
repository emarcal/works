<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Token;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tokens = Token::all();
        $tokens_1 = Token::orderBy('position', 'ASC')->whereBetween('position', array(1, 4))->get();
        $tokens_2 = Token::orderBy('position', 'ASC')->whereBetween('position', array(5, 8))->get();
        return view('index',compact('tokens','tokens_1','tokens_2'));
    }
}
