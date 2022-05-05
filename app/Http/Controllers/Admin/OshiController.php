<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Oshi;
use App\Follower;
use App\User;
use App\Expense;
use Auth;
use carbon\Carbon;
use DateTime;
use Storage;

class OshiController extends Controller
{
    //
    public function add()
    {
        return view('admin.oshi.create');
    }
    
     public function create(Request $request)
    {
        $this->validate($request, Oshi::$rules);
        $oshi = new Oshi;
        $form = $request->all();
        
        if (isset($form['oshi_image'])) {
            $path = Storage::disk('s3')->putFile('/',$form['oshi_image'],'public');
            $oshi->image_path = Storage::disk('s3')->url($path);
        } else {
            $oshi->image_path = null;
        }
        // str_pad(埋め込み対象の文字を指定, 埋め込んだ後の桁数を指定, 埋めこむ文字を指定, STR_PAD_LEFT)
        $form['birthday'] = $form['birthday_y'] . str_pad($form['birthday_m'], 2, 0, STR_PAD_LEFT) . str_pad($form['birthday_d'], 2, 0, STR_PAD_LEFT);
        
        $form['history'] = $form['history_y'] . str_pad($form['history_m'], 2, 0, STR_PAD_LEFT) . str_pad($form['history_d'], 2, 0, STR_PAD_LEFT);
        
        unset($form['_token']);
        unset($form['oshi_image']);
        
        $oshi->fill($form);
        $oshi->save();
        
        return redirect('admin/oshi/create');
    }
    
    public function index(Request $request)
    {
        //認証ユーザーがフォローしているユーザーidを取得
        $followee = Follower::where('follower_id', Auth::id() )->pluck('followee_id')->toArray();
        // キーワード検索
        $cond_title = $request->cond_title;
        // パラメーターからuser_idを取得する
        $user_id = $request->get('user_id');
        // 自分の推しを表示する場合はログインidを格納
        if($user_id == '') {
            $user_id = Auth::id();
        }
        
        if($cond_title != '' && $user_id != '') {
            $oshis = Oshi::where('oshi_name', 'like', '%' .$cond_title . '%')->where('user_id', $user_id)->get();
        } else {
            $oshis = Oshi::where('user_id', $user_id)->get()->sortByDesc('tentacles');
        }
        
        return view('admin.oshi.index', [
            'oshis' => $oshis,
            'cond_title' => $cond_title,
            'followee' => $followee,
            'user_id' => $user_id
            ]);
    }
   
    public function edit(Request $request)
    {
        $oshi = Oshi::find($request->id);
        
        if (empty($oshi)) {
            abort(404);
        }
        
        return view('admin.oshi.edit', ['oshi_form' => $oshi]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Oshi::$rules);
        
        $oshi = Oshi::find($request->id);
        
        $oshi_form = $request->all();
        
        if ($request->remove == 'true') {
            $oshi_form['image_path'] = null;
        } elseif ($request->file('oshi_image')) {
            $path = Storage::disk('s3')->putFile('/',$oshi_form['oshi_image'],'public');
            $oshi->image_path = Storage::disk('s3')->url($path);
        } else {
            $oshi_form['image_path'] = $oshi->image_path;
        }
        
        unset($oshi_form['image']);
        unset($oshi_form['remove']);
        unset($oshi_form['_token']);
        
        $oshi->fill($oshi_form)->save();
        
        return redirect('admin/oshi/index');
    }
    
    public function delete(Request $request)
    {
        $oshi = Oshi::find($request->id);
        
        $oshi->delete();
        
        return redirect('admin/oshi/index');
    }
}
