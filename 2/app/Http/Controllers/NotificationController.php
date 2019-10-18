<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
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
            $notification = Notification::where('name', 'LIKE', "%$keyword%")
                ->orWhere('symbol', 'LIKE', "%$keyword%")
                ->orWhere('img', 'LIKE', "%$keyword%")
                ->orWhere('decimals', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $notification = Notification::latest()->paginate($perPage);
        }
        $url = env('XCHANGE_URL');

        return view('panel.notification.index', compact('notification','url'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('panel.notification.create');
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
        $text = $request->text;
        $date = date('Y/m/d');

        $requestData = $request->all();

        $notification = Notification::create([
            'text' => $text,
            'status' => "0",
            'date' => $date
        ]);

        return redirect('notifications')->with('flash_message', 'Notification added!');
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
        $notification = Notification::findOrFail($id);
        $url = env('XCHANGE_URL');
        return view('panel.notification.show',compact('notification','url'));
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
        $notification = Notification::findOrFail($id);
        $notifications = Notification::where('id',$id)->first();
        $url = env('XCHANGE_URL');
        return view('panel.notification.edit', compact('notification','notifications','url'));
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
      
        $text = $request->text;
        $date = $request->date;
        $dateformmat = date('Y/m/d',strtotime($date));
        
        if(!empty($date)){
            $change = Notification::where('id', $id)->first();
            $change->date = $dateformmat;
            $change->save();
        }
       
    
        $change = Notification::where('id', $id)->first();
        $change->text = $text;
        $change->save();


        return redirect('notifications')->with('flash_message', 'Notification updated!');
    }
    public function publish(Request $request, $id)
    {
        
        $change = Notification::where('id', $id)->first();
        $change->status = 1;
        $change->save();

        return redirect('notifications')->with('flash_message', 'Notification published!');
    }
    public function hide(Request $request, $id)
    {
        
        $change = Notification::where('id', $id)->first();
        $change->status = 0;
        $change->save();

        return redirect('notifications')->with('flash_message', 'Notification hidded!');
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
        Notification::destroy($id);

        return redirect('notifications')->with('flash_message', 'Notification deleted!');
    }
}
