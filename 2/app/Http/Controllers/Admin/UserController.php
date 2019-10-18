<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
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
            $user = User::where('name','LIKE',"%$keyword%")->paginate($perPage);
        } else {
            $user = User::paginate($perPage);
        }

        return view('admin.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {   

        return view('admin.user.create');
        
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
        
        $requestData = $request->except('roles');
        $roles=$request->roles;
        $user =  User::create($requestData);

         /* History */
       
         $user_online = Auth::user()->id;

         $last_id = User::latest()->first()->id;
 
         $UpdateDetails = User::where('id', $last_id)->first();
         $UpdateDetails->status = 1;
         $UpdateDetails->save();
 
         
         activity()
         ->causedBy($user_online)
         ->log('User: '.$last_id.' has created.');
         
         /* End History  */

        $user->assignRole($roles);



        return redirect('admin/user')->with('flash_message', 'User added!');
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


        $user = User::findOrFail($id);

        return view('admin.user.show', compact('user'));
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
        $user = User::findOrFail($id);

        return view('admin.user.edit', compact('user'));
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


        /* History  */

        $user = Auth::user()->id;
        
        activity()
        ->causedBy($user)
        ->log('User: '.$id.' has updated.');
        
        /* End History  */
        
        $user = User::findOrFail($id);
        $user->update($requestData);

        $user->syncRoles($request->roles);

        return redirect('admin/user')->with('flash_message', 'User updated!');
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
         ->log('User: '.$id.' has deactiveted.');
         
         /* End History  */

        $UpdateDetails = User::where('id', $id)->first();
        $UpdateDetails->status = 0;
        $UpdateDetails->save();

        return redirect('admin/user')->with('flash_message', 'User deleted!');
    }
    /*
     public function destroy($id)
    {
        User::destroy($id);

        return redirect('admin/user')->with('flash_message', 'User deleted!');
    }
    */
}