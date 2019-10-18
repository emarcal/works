<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Permission;
use App\Http\Resources\Permission as PermissionResource;
use Auth;
use Spatie\Activitylog\Models\Activity;


use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function index()
    {
        //Get all permission
        $out = array();

        if(Auth::check()){
        $permissions = Permission::paginate();
 
        // Return a collection of $permission with pagination
        return PermissionResource::collection($permissions);
        
        } else {
            return json_encode($out);
        }
    }
 
    public function show($id)
    {
        //Get the permission
        $permission = Permission::findOrfail($id);
 
        // Return a single permission
        return new PermissionResource($permission);
    }
 
    public function destroy($id)
    {
        Permission::destroy($id);
        return response()->json([
            'res' => true,
            'error' => ''
        ]);
    }
 
    public function store(Request $request)  {
        $permission_name = $request->name;
        Permission::create([
    
            'name' => $permission_name,
           
            
        ]);
        /* History */
       
        $permission_online = Auth::user()->id;

        $last_id = Permission::latest()->first()->id;

        $update = Permission::where('id', $last_id)->first();
        $update->guard_name = 'web';
        $update->save();
        
        activity()
        ->causedBy($permission_online)
        ->log('Permission: '.$last_id.' has created.');
        
        /* End History  */
        return response()->json([
            'res' => true,
            'error' => ''
        ]);
        
    }

    public function edit($id,Request $request)  {

        
        $permission = Permission::where("id",$id)->first();
        $permission->name = $request->name;
        $permission->save();
        
        activity()
        ->causedBy(Auth::user()->id)
        ->log('Permission: '.$id.' has edit ');
        
        /* End History  */
        return response()->json([
            'res' => true,
            'error' => ''
        ]);
        
    }

    public function search($sk,Request $request)  {

        $permissions = Permission::where('name','LIKE',"%$sk%")->get();
    
        return response()->json([
            'res' => true,
            'error' => '',
            'data' => $permissions
        ]);
        
    }
}
