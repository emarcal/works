<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\User;
use App\Log;
use App\LogUser;
use App\LogDoc;
use App\Doc;

class PanelController extends Controller
{

    public function logs(){
        $logs = Log::orderBy('id','desc')->paginate(100);
        return view('panel.logs.history',compact('logs'));
    }
    public function userlogs(){
        $userlogs = LogUser::orderBy('id','desc')->get();
        return view('panel.logs.userhistory',compact('userlogs'));
    }
    public function doclogs(Request $request){
        $url = env('XCHANGE_URL');
        $doclogs = LogDoc::orderBy('id','desc')->get();
        return view('panel.logs.dochistory',compact('doclogs','doc','url'));
    }
}
