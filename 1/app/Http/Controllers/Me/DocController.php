<?php

namespace App\Http\Controllers\Me;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Doc;
use App\LogDoc;
use Auth;
use Storage;
use File;
use Fylesystem;
use Input;

use Illuminate\Http\Request;

class DocController extends Controller
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
            $doc = Doc::where('type', 'LIKE', "%$keyword%")
                ->orWhere('doc_id', 'LIKE', "%$keyword%")
                ->orWhere('doc_address', 'LIKE', "%$keyword%")
                ->orWhere('user', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $doc = Doc::latest()->paginate($perPage);
        }

        return view('me.doc.index', compact('doc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('me.doc.create');
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
                if ($request->hasFile('doc_id')) {
            $requestData['doc_id'] = $request->file('doc_id')
                ->store('files');
        }
        if ($request->hasFile('doc_address')) {
            $requestData['doc_address'] = $request->file('doc_address')
                ->store('files');
        }

        Doc::create($requestData);

        return redirect('me/doc')->with('flash_message', 'Doc added!');
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
        $doc = Doc::findOrFail($id);

        return view('me.doc.show', compact('doc'));
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
        $doc = Doc::findOrFail($id);

        return view('me.doc.edit', compact('doc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updatefileid(Request $request)
    {

         $requestData = $request->all();

         if ($request->hasFile('doc_id')) {

            if($request->file('doc_id')->extension() != "pdf") {

            $requestData['doc_id'] = md5(uniqid()).'.jpg';

            $tpath = '/var/www/storage/' .Auth::user()->id. "/" . $requestData['doc_id'];

            $file = $request->file('doc_id');
            
            
            } else {
                $requestData['doc_id'] = $request->file('doc_id')->store(Auth::user()->id,'public'); 
            }

            $old = Doc::where('user', Auth::user()->id)->first();
            $doc = $old->doc_id;

           
            $file->move($tpath,$requestData['doc_id']);

            $update = Doc::where('user', Auth::user()->id)->first();
            $update->doc_id =  Auth::user()->id . "/" . $requestData['doc_id'];
            $update->status_id = 'sent';
            $update->save();

            return redirect('me/account')->with('successid', 'Doc updated!');
           
        } else {

            return redirect('me/account')->with('uploaderror', 'Upload Error!');
        }

     
    }

    public function updatefileidverse(Request $request)
    {

        $requestData = $request->all();

         if ($request->hasFile('doc_id_verse')) {

            if($request->file('doc_id_verse')->extension() != "pdf") {

            $requestData['doc_id_verse'] = md5(uniqid()).'.jpg';

            $tpath = '/var/www/storage/' .Auth::user()->id. "/" . $requestData['doc_id_verse'];

            Image::make($request->file('doc_id_verse'))->encode('jpg', 60)->save($tpath);
            
            
            } else {
                $requestData['doc_id_verse'] = $request->file('doc_id_verse')->store(Auth::user()->id,'public'); 
            }

            $old = Doc::where('user', Auth::user()->id)->first();
            $doc = $old->doc_id_verse;
            
            // History
            $ip = request()->server('HTTP_CF_CONNECTING_IP');
            $log = LogDoc::create([
                'user' => Auth::user()->id,
                'description' => "User '".Auth::user()->username."' changed the 'verse id doc' from ".$doc."  to '".Auth::user()->id . "/" . $requestData['doc_id_verse']."'.",
                'type' => "verse id",
                'old' => $doc,
                'doc' => Auth::user()->id . "/" . $requestData['doc_id_verse'],
                'date' => time(),
                'ip' => $ip
            ]);
            // History

            $update = Doc::where('user', Auth::user()->id)->first();
            $update->doc_id_verse =  Auth::user()->id . "/" . $requestData['doc_id_verse'];
            $update->status_id_verse = 'sent';
            $update->save();
            return redirect('me/account')->with('successid_verse', 'Doc updated!');
           
        } else {

            return redirect('me/account')->with('uploaderror', 'Upload Error!');
        }

       
    }

    public function updatefileaddress(Request $request)
    {
        $requestData = $request->all();


        // CASO EXISTA UM UPLOAD do fileinput doc_address

        if ($request->hasFile('doc_address')) {

            // Caso nao seja PDF ( so pode ser imagem ) entao vamos converter qq formato para jpg

           if($request->file('doc_address')->extension() != "pdf") {

                    

                $requestData['doc_address'] = md5(uniqid()).'.jpg'; // Vamos criar um novo nome ao ficheiro da imagem

                $tpath = '/var/www/storage/' .Auth::user()->id. "/" . $requestData['doc_address']; // Onde guardar a imagenm

                Image::make($request->file('doc_address'))->encode('jpg', 60)->save($tpath); // COnverter a imagem para um jpg e guardar
           
           
           } else {
               // caso seja PDF -> salva directamente
               $tpath = '/var/www/storage/' .Auth::user()->id. "/" . $requestData['doc_address'];
               $requestData['doc_address'] = $request->file('doc_address')->store($tpath); 
           }

           $old = Doc::where('user', Auth::user()->id)->first();
           $doc = $old->doc_address;
           
           // History 
           $ip = request()->server('HTTP_CF_CONNECTING_IP');
           $log = LogDoc::create([
               'user' => Auth::user()->id,
               'description' => "User '".Auth::user()->username."' changed the 'address doc' from ".$doc."  to '".Auth::user()->id . "/" . $requestData['doc_address']."'.",
               'type' => "address",
               'old' => $doc,
               'doc' => Auth::user()->id . "/" . $requestData['doc_address'],
               'date' => time(),
               'ip' => $ip
           ]);
           // History


           $update = Doc::where('user', Auth::user()->id)->first();
           $update->doc_address =  Auth::user()->id . "/" . $requestData['doc_address'];
           $update->status_address = 'sent';
           $update->save();
           return redirect('me/account')->with('successaddress', 'Doc updated!');
          
       } else {

           return redirect('me/account')->with('uploaderror', 'Upload Error!');
       }

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
        Doc::destroy($id);

        return redirect('me/doc')->with('flash_message', 'Doc deleted!');
    }
}
