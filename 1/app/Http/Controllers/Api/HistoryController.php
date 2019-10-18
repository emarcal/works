<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Activity_log;
use App\Http\Resources\History as TaskResource;
class HistoryController extends Controller
{
    public function index()
    {
        //Get all activity_log
        $activity_logs = Activity_log::paginate(500000000);
 
        // Return a collection of $activity_log with pagination
        return TaskResource::collection($activity_logs);
    }
 
    public function show($id)
    {
        //Get the activity_log
        $activity_log = Activity_log::findOrfail($id);
 
        // Return a single activity_log
        return new TaskResource($activity_log);
    }
 
    public function destroy($id)
    {
        //Get the activity_log
        $activity_log = Activity_log::findOrfail($id);
 
        if($activity_log->delete()) {
            return new TaskResource($activity_log);
        } 
 
    }
 
    public function store(Request $request)  {
 
        $activity_log = $request->isMethod('put') ? Activity_log::findOrFail($request->activity_log_id) : new Activity_log;
            
        $activity_log->id = $request->input('activity_log_id');
        $activity_log->name = $request->input('name');
        $activity_log->description = $request->input('description');
        $activity_log->activity_log_id =  1; //$request->activity_log()->id;
 
        if($activity_log->save()) {
            return new TaskResource($activity_log);
        } 
        
    }
}
