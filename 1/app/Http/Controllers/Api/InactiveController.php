<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Inactive;
use App\Http\Resources\Inactive as InactiveResource;
use Auth;
use Spatie\Activitylog\Models\Activity;


use App\Http\Controllers\Controller;

class InactiveController extends Controller
{
    public function index()
    {
        //Get all inactive
        $out = array();

        if(Auth::check()){
        $inactives = Inactive::paginate();
 
        // Return a collection of $inactive with pagination
        return InactiveResource::collection($inactives);
        
        } else {
            return json_encode($out);
        }
    }
 
    public function show($id)
    {
        //Get the inactive
        $inactive = Inactive::findOrfail($id);
 
        // Return a single inactive
        return new InactiveResource($inactive);
    }
 
    public function destroy($id)
    {
        //Get the inactive
        $update = Inactive::where('id', $id)->first();
        $update->status = 1;
        $update->save();

 
         
         activity()
         ->causedBy(Auth::user()->id)
         ->log('Inactive: '.$id.' has deleted.');
         

         return response()->json([
            'res' => true,
            'error' => ''
        ]);
     
 
    }
 
    public function store(Request $request)  {
        $inactive_name = $request->name;
        $inactive_email = $request->email;
        $inactive_password = $request->password;
        Inactive::create([
            'status' => 1,
            'name' => $inactive_name,
            'email' => $inactive_email,
            'password' => $inactive_password
            
        ]);
        /* History */
       
        $inactive_online = Auth::inactive()->id;

        $last_id = Inactive::latest()->first()->id;
        
         $update = Inactive::where('id', $last_id)->first();
         $update->status = 1;
         $update->save();
        
        activity()
        ->causedBy($inactive_online)
        ->log('Inactive: '.$last_id.' has created.');
        
        /* End History  */
        return response()->json([
            'res' => true,
            'error' => ''
        ]);
        
    }

    public function edit($id,Request $request)  {

        
        $inactive = Inactive::where("id",$id)->first();
       
        $inactive->name = $request->name;
        $inactive->email = $request->email;
        $inactive->password = $request->password;

        $inactive->save();
        
        activity()
        ->causedBy(Auth::inactive()->id)
        ->log('Inactive: '.$id.' has edit ');
        
        /* End History  */
        return response()->json([
            'res' => true,
            'error' => ''
        ]);
        
    }

    public function search($sk,Request $request)  {

        $inactives = Inactive::where('name','LIKE',"%$sk%")->get();
    
        
    
        return response()->json([
            'res' => true,
            'error' => '',
            'data' => $inactives
        ]);
        
    }
}
