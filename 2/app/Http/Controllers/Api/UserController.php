<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Http\Resources\User as UserResource;
use Auth;



use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        //Get all user
        $out = array();

        if(Auth::check()){
        $users = User::paginate();
 
        // Return a collection of $user with pagination
        return UserResource::collection($users);
        
        } else {
            return json_encode($out);
        }
    }
 
    public function show($id)
    {
        //Get the user
        $user = User::findOrfail($id);
 
        // Return a single user
        return new UserResource($user);
    }
 
    public function destroy($id)
    {
        //Get the user
        $update = User::where('id', $id)->first();
        $update->status = 0;
        $update->save();

 
         
         activity()
         ->causedBy(Auth::user()->id)
         ->log('User: '.$id.' has deleted.');
         

         return response()->json([
            'res' => true,
            'error' => ''
        ]);
     
 
    }
 
    public function store(Request $request)  {

        $requestData = $request->except('roles');
        $roles=$request->roles;
        //$user =  User::create($requestData);


        $user_name = $request->name;
        $user_email = $request->email;
        $user_password = $request->password;
        User::create([
            'status' => 1,
            'name' => $user_name,
            'email' => $user_email,
            'password' => $user_password
            
        ]);
        /* History */
       
        $user_online = Auth::user()->id;

        $user = User::latest()->first();
        
         //$update = User::where('id', $last_id)->first();
         //$update->status = 1;
         //$update->save();

         $user->assignRole($roles);

        activity()
        ->causedBy($user_online)
        ->log('User: '.$user->id.' has created.');
        
        /* End History  */
        return response()->json([
            'res' => true,
            'error' => ''
        ]);
        
    }

    public function edit($id,Request $request)  {

        
        $user = User::where("id",$id)->first();
       
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();
        
        activity()
        ->causedBy(Auth::user()->id)
        ->log('User: '.$id.' has edit ');
        
        /* End History  */
        $user->syncRoles($request->roles);

        return response()->json([
            'res' => true,
            'error' => ''
        ]);
        
    }

    public function search($sk,Request $request)  {

        $users = User::where('name','LIKE',"%$sk%")->get();
    
        
    
        return response()->json([
            'res' => true,
            'error' => '',
            'data' => $users
        ]);
        
    }
}
