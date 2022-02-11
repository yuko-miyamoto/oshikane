<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Oshi;
use App\Gate;
use Auth;

class GateController extends Controller
{
    //
    public function add()
    {
        $posts = Oshi::where('user_id', Auth::id())->get();
        
        return view('admin.gate.create',['posts' => $posts,]);
    }
    
   public function update(Request $request)
    {
        $this->validate($request,
        ['text_history' => 'required |max:15',
        'text_point' => 'required |max:15',
        'text_input' => 'required |max:15',
        'text_now' => 'required |max:15',]);
        
        $oshi = new Oshi;
        $form = $request->all();
        
        $oshi = Oshi::find($request->id);
        
        unset($form['_token']);
        
        $oshi->fill($form)->save();
        
        return redirect('admin/gate/');
    }
    
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            $posts = Oshi::where('oshi_name', $cond_title)
            ->where( 'user_id', Auth::id() )
            ->get()
            ->sortByDesc("created_at");
        } else {
            $posts = Oshi::whereNotNull(['text_history', 'text_point', 'text_input', 'text_now'])
            ->get()
            ->sortByDesc("created_at");
        }
        return view('admin.gate.index',['posts' => $posts, 'cond_title' => $cond_title]);
    }
}
    