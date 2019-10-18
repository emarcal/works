<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Activity_log;
use Illuminate\Http\Request;

class Activity_logController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $activity_log = Activity_log::where('description', 'LIKE', "%$keyword%")
                ->orWhere('causer_id', 'LIKE', "%$keyword%")
                ->orWhere('created_at', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $activity_log = Activity_log::latest()->paginate($perPage);
        }

        return view('admin.activity_log.index', compact('activity_log'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.activity_log.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Activity_log::create($requestData);

        return redirect('admin/activity_log')->with('flash_message', 'Activity_log added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $activity_log = Activity_log::findOrFail($id);

        return view('admin.activity_log.show', compact('activity_log'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $activity_log = Activity_log::findOrFail($id);

        return view('admin.activity_log.edit', compact('activity_log'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $activity_log = Activity_log::findOrFail($id);
        $activity_log->update($requestData);

        return redirect('admin/activity_log')->with('flash_message', 'Activity_log updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Activity_log::destroy($id);

        return redirect('admin/activity_log')->with('flash_message', 'Activity_log deleted!');
    }
}
