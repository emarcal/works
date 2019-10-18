<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\Inactive;
use App\User;
use Illuminate\Http\Request;

class InactivesController extends Controller
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
            $inactives = Inactive::where('name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $inactives = Inactive::latest()->paginate($perPage);
        }

        return view('admin.inactives.index', compact('inactives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.inactives.create');
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
        
        Inactive::create($requestData);

        return redirect('admin/inactives')->with('flash_message', 'Inactive added!');
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
        $inactive = Inactive::findOrFail($id);

        return view('admin.inactives.show', compact('inactive'));
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
        $inactive = Inactive::findOrFail($id);

        return view('admin.inactives.edit', compact('inactive'));
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
        
        $inactive = Inactive::findOrFail($id);
        $inactive->update($requestData);

        return redirect('admin/inactives')->with('flash_message', 'Inactive updated!');
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
         /* History  */

         $user = Auth::user()->id;
        
         activity()
         ->causedBy($user)
         ->log('User: '.$id.' has reactiveted.');
         
         /* End History  */

        $UpdateDetails = User::where('id', $id)->first();
        $UpdateDetails->status = 1;
        $UpdateDetails->save();

        return redirect('admin/inactives')->with('flash_message', 'User deleted!');
    }
    /*
    public function destroy($id)
    {
        Inactive::destroy($id);

        return redirect('admin/inactives')->with('flash_message', 'Inactive deleted!');
    }
    */
}
