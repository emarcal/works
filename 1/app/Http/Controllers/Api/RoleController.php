<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Role;
use App\Permission;
use App\Http\Resources\Role as RoleResource;
use Auth;
use Spatie\Activitylog\Models\Activity;


use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {
        //Get all role
        $out = array();

        if(Auth::check()){
        $roles = Role::paginate();
 
        // Return a collection of $role with pagination
        return RoleResource::collection($roles);
        
        } else {
            return json_encode($out);
        }
    }
 
    public function show($id)
    {
        //Get the role
        $role = Role::findOrfail($id);
 
        // Return a single role
        return new RoleResource($role);
    }
 
    public function destroy($id)
    {
        Role::destroy($id);
        return response()->json([
            'res' => true,
            'error' => ''
        ]);
    }
 
    public function store(Request $request)  {
        $role_name = $request->name;
        Role::create([
    
            'name' => $role_name
            
        ]);

        $last_id = Role::latest()->first()->id;

        $update = Role::where('id', $last_id)->first();
        $update->guard_name = "web";
        $update->save();
        /* History */
       
        $role_online = Auth::user()->id;

        $last_id = Role::latest()->first()->id;
        
        
        activity()
        ->causedBy($role_online)
        ->log('Role: '.$last_id.' has created.');
        
        /* End History  */
        return response()->json([
            'res' => true,
            'error' => ''
        ]);
        
    }

    public function edit($id,Request $request)  {

        
        $role = Role::where("id",$id)->first();
        $role->name = $request->name;
        $role->save();
        
        activity()
        ->causedBy(Auth::user()->id)
        ->log('Role: '.$id.' has edit ');
        
        /* End History  */
        return response()->json([
            'res' => true,
            'error' => ''
        ]);
        
    }

    public function search($sk,Request $request)  {

        $roles = Role::where('name','LIKE',"%$sk%")->get();
    
        return response()->json([
            'res' => true,
            'error' => '',
            'data' => $roles
        ]);
        
    }
}
