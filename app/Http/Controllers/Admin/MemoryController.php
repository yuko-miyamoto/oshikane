<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Memory;
use App\User;
use App\Follower;
use Auth;
use Carbon\Carbon;
use Storage;

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
            $path = Storage::disk('s3')->putFile('/',$form['stage_image'],'public');
            $memory->image_path = Storage::disk('s3')->url($path);
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
        //認証ユーザーがフォローしているユーザーidを取得
        $followee = Follower::where('follower_id', Auth::id() )->pluck('followee_id')->toArray();
        //index.viewで一覧と詳細でtitleを置き換える
        [ $index, $detail ] = ["メモリー一覧", "メモリー詳細" ];
        // キーワード検索
        $cond_title = $request->cond_title;
        // パラメーターからメモリーidを取得する
        $memory_id = $request->get('id');
        // パラメーターからuser_idを取得する
        $user_id = $request->get('user_id');
        // 自分の投稿メモリーを表示する場合はログインidを格納
        if($user_id == '') {
            $user_id = Auth::id();
        }
        
        if($memory_id != '' && $user_id != '') {                  
            $memories = Memory::where('user_id', $user_id)->where('id', $memory_id)->get();  
        } elseif($cond_title != '' && $user_id != '') {
            $memories = Memory::where('artist', 'like', '%' .$cond_title . '%')->where('user_id', $user_id)->orwhere('place', 'like', '%' .$cond_title . '%')->get();
        } else {
            $memories = Memory::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
        }
        
        return view('admin.memory.index', [
            'memories' => $memories,
            'cond_title' => $cond_title,
            'memory_id' => $memory_id,
            'index' => $index,
            'detail' => $detail,
            'followee' => $followee,
            'user_id' => $user_id,
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
        $memory_form = $request->all();
        
        if ($request->remove == 'true') {
            $memory_form['image_path'] = null;
        } elseif ($request->file('stage_image')) {
            $path = Storage::disk('s3')->putFile('/',$memory_form['stage_image'],'public');
            $memory_form['image_path'] = Storage::disk('s3')->url($path);
        } else {
            $memory_form['image_path'] = $memory->image_path;
        }
        
        unset($memory_form['stage_image']);
        unset($memory_form['remove']);
        unset($memory_form['_token']);
        
        $memory->fill($memory_form)->save();
        
        return redirect('admin/memory/index');
    }
    
    public function delete(Request $request)
    {
        $memory = Memory::find($request->id);
        $memory->delete();
        
        return redirect('admin/memory/index');
    }
    
}
