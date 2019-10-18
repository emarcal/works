<?php

namespace App\Http\Controllers\Me;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Doc;
use App\Log;
use App\Token;
use Auth;
use App\G2fa;
use App\Order;
use Illuminate\Support\Facades\Hash;
use App\Mail\OrderShipped;
use Mail;
use App\Mail\ResetEmail;
use Illuminate\Support\Facades\Crypt;
use Google2FA;

class DashboardController extends Controller
{
    public function index(){
        

        
        if(empty(Auth::user()->email_verified_at)){
            $emailstatus = "close";
            $emailcolor = "#f96a6a";
        }else{
            $emailstatus = "check";
            $emailcolor = "#4cae50";
        }
        $user = User::where('id',Auth::user()->id)->first();
        $doc = Doc::where('user',Auth::user()->id)->first();
        
        $id_doc = $doc->status_id;
        $idverse_doc = $doc->status_id_verse;

        $id_doc_verify = $doc->doc_id;
        $address_doc_verify = $doc->doc_address;


        if($id_doc == "new"){
            $idstatus = "close-circle";
            $idmessage = "Faça upload do seu CPF";
            $idcolor = "#f96a6a";
            $idlink = "1";
        }if($id_doc == "processing"){
            $idstatus = "refresh";
            $idmessage = "No processo...";
            $idcolor = "#eab535";
            $idlink = "0";
        }if($id_doc == "sent"){
            $idstatus = "caret-up-circle";
            $idmessage = "File Sent";
            $idcolor = "#eab535";
            $idlink = "0";
        }if($id_doc == "accepted"){
            $idstatus = "check-circle";
            $idmessage = "CPF verificado";
            $idcolor = "#4cae50"; 
            $idlink = "0";
        }if($id_doc == "refused"){
            $idstatus = "close-circle";
            $idmessage = "Recusado";
            $idcolor = "#f96a6a";
            $idlink = "1";
        }
    //-------------------------------------------------------

    if($idverse_doc == "new"){
        $idversestatus = "close-circle";
        $idversemessage = "Upload your ID verse";
        $idversecolor = "#f96a6a";
        $idverselink = "1";
    }if($idverse_doc == "processing"){
        $idversestatus = "refresh";
        $idversemessage = "Processing...";
        $idversecolor = "#eab535";
        $idverselink = "0";
    }if($idverse_doc == "sent"){
        $idversestatus = "caret-up-circle";
        $idversemessage = "File Sent";
        $idversecolor = "#eab535";
        $idverselink = "0";
    }if($idverse_doc == "accepted"){
        $idversestatus = "check-circle";
        $idversemessage = "Verse ID verified";
        $idversecolor = "#4cae50"; 
        $idverselink = "0";
    }if($idverse_doc == "refused"){
        $idversestatus = "close-circle";
        $idversemessage = "Refused";
        $idversecolor = "#f96a6a";
        $idverselink = "1";
    }
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        $id_address = $doc->status_address;
        if($id_address == "new"){
            $addressstatus = "close-circle";
            $addressmessage = "Upload your Address";
            $addresscolor = "#f96a6a";
            $addresslink = "1";
        }if($id_address == "processing"){
            $addressstatus = "refresh";
            $addressmessage = "Processing...";
            $addresscolor = "#eab535";
            $addresslink = "0";
        }if($id_address == "sent"){
            $addressstatus = "caret-up-circle";
            $addressmessage = "File Sent";
            $addresscolor = "#eab535";
            $addresslink = "0";
        }if($id_address == "accepted"){
            $addressstatus = "check-circle";
            $addressmessage = "Verified Address";
            $addresscolor = "#4cae50";
            $addresslink = "0";
        }if($id_address == "refused"){
            $addressstatus = "close-circle";
            $addressmessage = "Refused";
            $addresscolor = "#f96a6a";
            $addresslink = "1";
        }

        $verified = Auth::user()->verified;

        $tokens_1 = Token::orderBy('position', 'ASC')->whereBetween('position', array(1, 4))->get();
        $tokens_2 = Token::orderBy('position', 'ASC')->whereBetween('position', array(5, 8))->get();

        return view('me/dashboard',compact('user','emailstatus','emailcolor','idstatus','idcolor','idmessage','idversestatus','idversecolor','idversemessage','addressstatus','addresscolor','addressmessage','idlink','idverselink','addresslink','verified','tokens_1','tokens_2'));
    }
    public function account(){
        $phpg2fa = new G2fa();
        return view('me/account',compact('phpg2fa'));
    }
    public function history(){
      
    }
 
    public function tokenicomanage(){
        
    }

    public function kl(Request $request)
    {
      

    }

    public function updatemail(Request $request)
    {

        $id = $request->id;
        $email = $request->email;
        $emailverify = User::where('email',$email)->first();
        if(!empty($emailverify)){
            return redirect('me/account')->with('equalmail', ' This E-Mail already exists!');
        }
       
        
        $this->validate($request, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        
        
         // Waiting 
        $change = User::where('id', $id)->first();
        $change->new_email = $email;
        $change->save();
        $user = User::where('id',Auth::user()->id)->first();
        $new_email = Auth::user()->new_email;

        $encryptedid = Crypt::encryptString($id);
        $encryptedmail = Crypt::encryptString($email);
        


        Mail::send('mail', ['encryptedid' => $encryptedid, 'encryptedmail' => $encryptedmail, 'new_email' => $new_email ], function($message) {
           $message->to(Auth::user()->email, 'Old Email')->subject
              ('Change E-Mail');
           $message->from('noreply@xchangeumbrella.com','Xchange Umbrella');
        });
        
        return redirect('/me/account')->with('mailchanged', 'Success');
    }
    public function changemail(Request $request){

        $id = $_GET['jhvyuv'];
        $email = $_GET['vjhgn'];
        $decryptedid = Crypt::decryptString($id);
        $decryptedemail = Crypt::decryptString($email);

        // Verify
        $checkemail = User::where('email', $decryptedemail)->first();
        if(!empty($checkemail)){

            $change = User::where('id', $decryptedid)->first();
            $change->new_email = "";
            $change->save();

            return redirect('changeerror')->with('equalmail', 'Error');
        }else{
            $change = User::where('id', $decryptedid)->first();
            $change->email = $decryptedemail;
            $change->email_verified_at = null;
            $change->save();
            $user = User::where('id',$decryptedid)->first();
            \Mail::to($decryptedemail)->send(new ResetEmail);
            return redirect('changesuccess')->with('mailchanged', 'Success');
        }       

    }
    public function updateinfo(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
   
            'birth' => ['required', 'string', 'max:255'],
            'cpf' => ['string', 'max:255']
            
        ]);

        $id = $request->input('id');
        
        $name = $request->input('name');
        $lastname = $request->input('lastname');
        $birth = $request->input('birth');
        $cpf = $request->input('cpf');

        

        $current_name = Auth::user()->name;
        $current_lastname = Auth::user()->lastname;
        $current_birth = Auth::user()->birth;
        $current_cpf = Auth::user()->cpf;



        if(
            $current_name != $name ||
            $current_lastname != $lastname ||

            $current_cpf != $cpf

            ){
            // User
            $change = User::where('id', Auth::user()->id)->first();
            $change->verified = "0";
            $change->save();
            // Doc
            $change = Doc::where('user', Auth::user()->id)->first();
            $change->status_id = "new";
            $change->doc_id = "";
            $change->save();
        }
        

        // Updating
        $change = User::where('id', $id)->first();
        $change->name = $name;
        $change->lastname = $lastname;
        $change->cpf = $cpf;
        $change->birth = $birth;
        
        $change->save();

        return redirect('/me/account')->with('successinfo', 'Success');
    }
    
    public function change2fa(Request $request)
    {
       

       
    }
    public function updatepassword(Request $request)
    {
       
    }
    public function resetupload(Request $request)
    {
       
        $type = $request->input('type');

        if($type == "front_id"){
            // Updating
            $change = Doc::where('user', Auth::user()->id)->first();
            $change->status_id = "new";
            $change->save();

            
        }
        if($type == "verse_id"){
            // Updating
            $change = Doc::where('user', Auth::user()->id)->first();
            $change->status_id_verse = "new";
            $change->save();

             // History
             $ip = request()->server('HTTP_CF_CONNECTING_IP');
             $log = Log::create([
                 'user' => Auth::user()->id,
                 'description' => "User '".Auth::user()->username."' reseted the verse id document upload.",
                 'date' => time(),
                 'ip' => $ip
             ]);
             // History
        }
        if($type == "address"){
            // Updating
            $change = Doc::where('user', Auth::user()->id)->first();
            $change->status_address = "new";
            $change->save();

             // History
             $ip = request()->server('HTTP_CF_CONNECTING_IP');
             $log = Log::create([
                 'user' => Auth::user()->id,
                 'description' => "User '".Auth::user()->username."' reseted the address document upload.",
                 'date' => time(),
                 'ip' => $ip
             ]);
             // History

        }
        

        return redirect('/me/account')->with('resetsuccess', 'Success');
    }
}
