<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use App\Message;
use App\Log;
use App\LogUser;
use App\LogLogin;
use App\LogDoc;
use App\Doc;
use App\Mail;
use App\Token;
use App\Mail\OrderShipped;
use File;
use DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function users(Request $request){
        $url = env('XCHANGE_URL');

        // FILTRO ACCOUNT
        $account = "all";
        $status = "all";
        if(isset($request->search)) { // Search
            $users = User::where('email', 'like', '%'.$request->search.'%')
            ->orWhere('name', 'like', '%'.$request->search.'%')
            ->paginate(100);

        } elseif(isset($request->account)) { // Filtro
            $account = $request->account;
            $users = User::where('verified',$account)->paginate(100);
            $users->withPath('/users?account='.$account);

        } elseif(isset($request->status)) { // Filtro
            $status = $request->status;
            $sql = "SELECT * FROM users WHERE id IN (SELECT user FROM docs WHERE status_id = '".$status."' AND status_id_verse = '".$status."' AND status_address='".$status."')";
            $users = DB::select( DB::raw($sql));      
        } else { // Listagem sem filtros ( all )
            $users = User::paginate(100);
        }


        $users_active = User::where('status','1')->get();
        $users_blocked = User::where('status','0')->get();
        $users_verified = User::where('verified','1')->get();
        $users_unverified = User::where('verified','0')->get();

        return view('panel.users.users',compact('users','users_active','users_blocked','users_verified','users_unverified','account','status','url'));
    }
    public function show($id){
        $user = User::where('id',$id)->first();
        $tokens = Token::all();
        $logs = Log::where('user',$id)->orderBy('id','desc')->get();
        $userlogs = LogUser::where('user',$id)->orderBy('id','desc')->get();
        $loginlogs = LogLogin::where('user_id',$id)->orderBy('id','desc')->get();
        $doclogs = LogDoc::where('user',$id)->orderBy('id','desc')->get();

        $url = env('XCHANGE_URL');

        if(empty($user)){
            return redirect("/users");
        }
        return view('panel.users.show',compact('user','logs','userlogs','loginlogs','doclogs','tokens','url'));
    }



    public function edit($id){
        $user = User::where('id',$id)->first();
        if(empty($user)){
            return redirect("/users");
        }
        return view('panel.users.edit',compact('user'));
    }

    public function userupdate(Request $request){

        $id = $request->id;
        $name = $request->name;
        $lastname = $request->lastname;
        $username = $request->username;
        $email = $request->email;
        $cpf = $request->cpf;
        $birth = $request->birth;
        $status = $request->status;
        $verified = $request->verified;
       
        
        $change = User::where('id', $id)->first();
        $change->name = $name;
        $change->lastname = $lastname;
        $change->email = $email;
        $change->cpf = $cpf;
        $change->username = $username;
        $change->status = $status;
        $change->verified = $verified;
        $change->save();


       
        if($verified == 1) {
            $docs = Doc::where("user",$id)->first();
            if(!$docs) {
                Doc::create([
                    "user" => $id,
                    "status_id" => "new",
        
                ]);
                $docs = Doc::where("user",$id)->first();
            }
            $docs->status_id = 'accepted';
    
            $docs->save();
        }

       

        $user = User::where('id', $id)->first();

     
      
        return redirect("user/edit/".$id)->with('message','User has been edited!');
    }

    public function changepassword(Request $request){

        $id = $request->id;
        $password = $request->password;
        $confirm_password = $request->confirm_password;

        if($password ==  $confirm_password){
        $user = User::where('id',$id)->first();
            $user->password = Hash::make($password);
            $user->save();
        } else {

        }
        return redirect("user/edit/".$id);
    }

    public function verify($id){

        // if empty user redirect to users
        $user = User::where('id',$id)->first();
        $doc = Doc::where('user', $id)->first();

        if(!$user){
            return redirect("/users");
        }

        if (!$doc) {
            Doc::create([
                'user' =>  $id,
                'status_id' => 'new',
                'status_id_verse' => 'new',
                'status_address' => 'new',
            ]);
            $doc = Doc::where('user',$id)->first();
        }

        
        // Criar Pasta caso não exista
        $path = "/var/www/storage/" . $id;
        if (!is_dir($path)) {
            File::makeDirectory($path, 0777, true, true);
        } 

        
        $messages = Message::orderBy('id','desc')->where('user',$id)->get();
        $url = env('XCHANGE_URL');
        $logs = Log::where('user',$id)->get();

        return view('panel.users.verify',compact('logs','user','doc','url','messages'));
    }
    public function docupdate(Request $request){

        $id = $request->id;
        $doc_id = $request->doc_id;
        $doc_id_verse = $request->doc_id_verse;
        $doc_address = $request->doc_address;

        if($doc_id == "accepted"){
            $change = User::where('id', $id)->first();
            $change->verified = "1";
            $change->save();
        }else{
            $change = User::where('id', $id)->first();
            $change->verified = "0";
            $change->save();
        }

        $change = Doc::where('user', $id)->first();
        $change->status_id = $doc_id;

        $change->save();

        $user = User::where('id', $id)->first();
        
        return redirect("user/verify/".$id)->with('message','Doc has edited!');
    }
    public function sendmessage(Request $request){

        $user = $request->user;
        $subject = $request->subject;
        $body = $request->body;
        $doc = $request->doc;
        $email = $request->email;
        $username = User::where('id', $user)->first();
        $create = Message::create([
            'moderator' => Auth::user()->id,
            'user' => $user,
            'subject' => $subject,
            'date' => time(),
            'body' => $body,
            'email' => $email
        ]);
        \Mail::to($email)->send(new Mail);
         // History
         $ip = request()->server('HTTP_CF_CONNECTING_IP');
         $log = Log::create([
             'moderator' => Auth::user()->id,
             'user' => $user,
             'description' => "Moderator '".Auth::user()->username."' sent email to user '".$username->username."'.",
             'date' => time(),
             'ip' => $ip
         ]);
         // History
        return redirect("user/verify/".$user)->with('message','Doc has edited!');
    }
    public function refusedmail(Request $request){

        $user = $request->user;
        $username = User::where('id', $user)->first();
        $subject = $request->subject;
        $body = $request->body;
        $email = $request->email;
        $doc = $request->doc;

        $create = Message::create([
            'moderator' => Auth::user()->id,
            'user' => $user,
            'subject' => $subject,
            'date' => time(),
            'body' => $body,
            'email' => $email
        ]);

        // Put in Refused
        if($doc == "id"){
            $change = Doc::where('user', $user)->first();
            $change->status_id = "refused";
            $change->save();
             // History
            $ip = request()->server('HTTP_CF_CONNECTING_IP');
            $log = Log::create([
                'moderator' => Auth::user()->id,
                'user' => $user,
                'description' => "Moderator '".Auth::user()->username."' refused the Front ID Doc of user '".$username->username."'.",
                'date' => time(),
                'ip' => $ip
            ]);
            // History
        }
        if($doc == "id_verse"){
            $change = Doc::where('user', $user)->first();
            $change->status_id_verse = "refused";
            $change->save();
            // History
            $ip = request()->server('HTTP_CF_CONNECTING_IP');
            $log = Log::create([
                'moderator' => Auth::user()->id,
                'user' => $user,
                'description' => "Moderator '".Auth::user()->username."' refused the Verse ID Doc of user '".$username->usernamee."'.",
                'date' => time(),
                'ip' => $ip
            ]);
            // History
        }
        if($doc == "address"){
            $change = Doc::where('user', $user)->first();
            $change->status_address = "refused";
            $change->save();
            // History
            $ip = request()->server('HTTP_CF_CONNECTING_IP');
            $log = Log::create([
                'moderator' => Auth::user()->id,
                'user' => $user,
                'description' => "Moderator '".Auth::user()->username."' refused the Address Doc of user '".$username->username."'.",
                'date' => time(),
                'ip' => $ip
            ]);
            // History
        }
        
        

        \Mail::to($email)->send(new Mail);
        
         
        return redirect("user/verify/".$user)->with('message','Doc has edited!');
    }
}
