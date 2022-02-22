<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Memory;
use App\User;
use Auth;
use Carbon\Carbon;

class MemoryController extends Controller
{
    //
    public function add()
    {
        return view('admin.memory.create');
    }
    
     public function create(Request $request)
    {
        $this->validate($request, Memory::$rules);
        $memory = new Memory;
        $form = $request->all();
        
        if (isset($form['stage_image'])) {
            $path = $request->file('stage_image')->store('public/image');
            $memory->image_path = basename($path);
        } else {
            $memory->image_path = null;
        }
        
        unset($form['_token']);
        unset($form['stage_image']);
        
        $memory->fill($form);
        $memory->save();
        
        return redirect('admin/memory/create');
    }
    
    public function index(Request $request)
    {
        //index.viewで一覧と詳細でtitleを置き換える
        [ $index, $detail ] = ["メモリー一覧", "メモリー詳細" ];
        
        $cond_title = $request->cond_title; 
        $memory_id = $request->get('id'); //idで取得
        $user_id = $request->get('user_id');
        
        
        
        if ($memory_id != '') {
            $memories = Memory::where('id', '=', $memory_id)->get();
        } elseif ($cond_title != '') {
            $memories = Memory::where('artist', 'like', '%' .$cond_title . '%')
            ->orwhere('place', 'like', '%' .$cond_title . '%')
            ->where( 'user_id', Auth::id() )->get();
        }  else {
            $memories = Memory::where('user_id', Auth::id() )
            ->orderBy('created_at', 'desc')->get();
        }
        return view('admin.memory.index', [
            'memories' => $memories,
            'cond_title' => $cond_title,
            'memory_id' => $memory_id,
            'index' => $index,
            'detail' => $detail,
            ]);
    }
    
   
    public function edit(Request $request)
    {
        $memory = Memory::find($request->id);
        if (empty($memory)) {
            abort(404);
        }
        
        return view('admin.memory.edit', ['memory_form' => $memory]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Memory::$rules);
        $memory = Memory::find($request->id);
        if ($request->remove == 'true') {
            $memory_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
        } else {
            $memory_form['image_path'] = $memory->image_path;
        }
        
        unset($memory_form['image']);
        unset($memory_form['remove']);
        unset($memory_form['_token']);
        
        $memory->fill($memory_form)->save();
        
        return redirect('admin/memory/');
    }
    
    public function delete(Request $request)
    {
        $memory = Memory::find($request->id);
        $memory->delete();
        
        return redirect('admin/memory/');
    }
    
}
