<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Token;
use App\TokenIco;
use Illuminate\Http\Request;

class TokenController extends Controller
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
            $token = Token::where('name', 'LIKE', "%$keyword%")
                ->orWhere('symbol', 'LIKE', "%$keyword%")
                ->orWhere('img', 'LIKE', "%$keyword%")
                ->orWhere('decimals', 'LIKE', "%$keyword%")
                ->orWhere('rate', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $token = Token::latest()->paginate($perPage);
        }
        $url = env('XCHANGE_URL');

        return view('panel.token.index', compact('token','url'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('panel.token.create');
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
                if ($request->hasFile('img')) {
            $requestData['img'] = $request->file('img')
                ->store('uploads', 'public');
        }

        
        // Validação PHP
        $name = $request->name; 
        $symbol = $request->symbol; 
        $decimals = $request->decimals; 
        $rate = $request->rate; 
        $status = $request->status; 

        if(is_numeric($decimals) && is_numeric($rate) ){
            if($decimals >= 1 && $decimals <= 99){
                $create = Token::create([
                    'name' => $name,
                    'symbol' => $symbol,
                    'img' => $requestData['img'],
                    'decimals' => $decimals,
                    'rate' => $rate,
                    'status' => $status
                ]);
            }else{
                $create = Token::create([
                    'name' => $name,
                    'symbol' => $symbol,
                    'img' => $requestData['img'],
                    'decimals' => "8",
                    'rate' => $rate,
                    'status' => $status
                ]);
            }
        }else{
            $create = Token::create([
                'name' => $name,
                'symbol' => $symbol,
                'img' => $requestData['img'],
                'decimals' => $decimals,
                'rate' => "0",
                'status' => $status
            ]);
        }
        

        return redirect('tokens')->with('flash_message', 'Token added!');
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
        $token = Token::findOrFail($id);
        $url = env('XCHANGE_URL');
        return view('panel.token.show',compact('token','url'));
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
        $token = Token::findOrFail($id);
        $tokens = Token::where('id',$id)->first();
        $url = env('XCHANGE_URL');
        return view('panel.token.edit', compact('token','tokens','url'));
    }

    public function ico($id)
    {
        $token = Token::where('id',$id)->first();
        $tokens = TokenIco::where('tokenid',$id)->get();
        return view('panel.token.ico', compact('tokens','token'));
    }
    public function icoindex()
    {
        $tokens = TokenIco::all();
        return view('panel.token.ico_index', compact('tokens'));
    }
    public function icocreate($id)
    {
        return view('panel.token.ico_create',compact('id'));
    }
    public function icostore(Request $request)
    {
        $token = $request->token;
        $price = $request->price;
        $amount = $request->amount;
        $orderid = md5(uniqid());

        $create = TokenIco::create([
            'amount' => $amount,
            'tokenid' => $token,
            'price' => $price,
            'orderid' => $orderid,
            'status' => "0"
        ]);

        return redirect('tokens/'.$token.'/ico');
    }
    public function icoedit($id)
    {
        $token = Token::where('id',$id)->first();
        $tokens = TokenIco::where('id',$id)->first();

        return view('panel.token.ico_edit', compact('token','tokens'));
    }
    public function icoupdate(Request $request)
    {
        $page = $request->page;
       
        $id = $request->id;
        $tokenid = $request->token;
        $price = $request->price;
        $amount = $request->amount;

        $tokens = TokenIco::where('id',$id)->first();
        $tokens->price = $price;
        $tokens->amount = $amount;
        $tokens->save();

        if($page == "all"){
            return redirect('tokens/ico');
        }else{
            return redirect('tokens/'.$tokenid.'/ico');
        }
       
    }
    public function activate($id,$token)
    {
        $tokens = TokenIco::where('id',$id)->first();
        $tokens->status = "1";
        $tokens->save();
        return back();
    }
    public function deactivate($id,$token)
    {
        $tokens = TokenIco::where('id',$id)->first();
        $tokens->status = "0";
        $tokens->save();
        return back();
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
                if ($request->hasFile('img')) {
            $requestData['img'] = $request->file('img')
                ->store('uploads', 'public');
        }
        $decimals = $request->decimals; 
        $rate = $request->rate; 

        if(is_numeric($decimals) && is_numeric($rate)){
            if($decimals >= 1 && $decimals <= 99){
                $token = Token::findOrFail($id);
                $token->update($requestData);
            }else{
                $get = Token::where('id',$id)->first();
                $old = $get->decimals;
                $change = Token::where('id', $id)->first();
                $change->decimals = $old;
                $rateold = $get->rate;
                $change->rate = $rateold;
                $change->save();
            }
        }
 
       
        

        return redirect('tokens')->with('flash_message', 'Token updated!');
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
        Token::destroy($id);

        return redirect('tokens')->with('flash_message', 'Token deleted!');
    }
}
