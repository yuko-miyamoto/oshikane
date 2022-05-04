<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Oshi;
use Auth;

class NotifyController extends Controller
{
    //
    public function add(Request $request)
    {
        $oshi = Oshi::find($request->id);
        
        return view('admin.notify.oshiadd',['oshi' => $oshi]);
    }
    
   public function oshiadd(Request $request)
    {
        $this->validate($request,
        ['text_history' => 'required |max:15',
        'text_point' => 'required |max:15',
        'text_input' => 'required |max:15',
        'text_now' => 'required |max:15',]);
        
        $oshi = Oshi::find($request->id);
        $form = $request->all();
        
        unset($form['_token']);
        
        $oshi->fill($form);
        $oshi->save();
        
        return redirect('admin/oshi/index');
    }
    
    public function index(Request $request)
    {
        $oshi_id = $request->get('id');
        
        $oshis = Oshi::where('id', $oshi_id)->get();
        
        return view('admin.notify.index',['oshis' => $oshis]);
    }
    
    public function edit(Request $request)
    {
        $oshi = Oshi::find($request->id);
        
        if(empty($oshi)) {
            abort(404);
        }
        
        return view('admin.notify.edit',['oshi_form' => $oshi]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request,
        ['text_history' => 'required | string | max:15',
        'text_point' => 'required | string | max:15',
        'text_input' => 'required | string | max:15',
        'text_now' => 'required | string | max:15',]);
        
        $oshi = Oshi::find($request->id);
        
        $oshi_form = $request->all();
        
        unset($oshi_form['_token']);
        
        $oshi->fill($oshi_form)->save();
        
        return redirect('admin/notify/index');
       
    }
}
    