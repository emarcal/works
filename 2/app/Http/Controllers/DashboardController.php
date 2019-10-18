<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Doc;

class DashboardController extends Controller
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
    public function index(Request $request)
    {
        // Contagem de users, verified users, unverified, active e blocked
        
        $id = $request->id;
        $users = User::all()->count();
        $verified_users = User::where('verified', '1')->count();
        $unverified = User::where('verified', '0')->count();
        $active_users = User::where('status', '1')->count();
        $blocked_users = User::where('status', '0')->count();

        // Contagem Docs Sent

        if (Doc::where('status_id', 'sent')->count() > 0) {
            $sent_status_id_docs = Doc::where('status_id', 'sent')->count();
         }

        if (Doc::where('status_id_verse', 'sent')->count() > 0) {
            $sent_status_id_verse_docs = Doc::where('status_id_verse', 'sent')->count();
         }

        if (Doc::where('status_address', 'sent')->count() > 0) {
            $sent_status_address_docs = Doc::where('status_address', 'sent')->count();
         }

        return view('dashboard', compact('users','verified_users','blocked_users','active_users', 'unverified'));
    }
}
