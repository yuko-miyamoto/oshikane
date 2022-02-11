<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Oshi;
use Auth;
use carbon\Carbon;
use DateTime;

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
            $path = $request->file('oshi_image')->store('public/image');
            $oshi->image_path = basename($path);
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
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            $posts = Oshi::where('oshi_name', $cond_title)
            ->where( 'user_id', Auth::id() )
            ->get();
        } else {
            $posts = Oshi::where('user_id', Auth::id())
            ->get()
            ->sortByDesc("tentacles");
            
        }
        
        $date = Carbon::now();
        
        return view('admin.oshi.index', ['posts' => $posts, 'cond_title' => $cond_title, 'date' => $date]);
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
        if ($request->remove == 'true') {
            $oshi_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $oshi_form['image_path'] = basename($path);
        } else {
            $oshi_form['image_path'] = $oshi->image_path;
        }
        
        unset($oshi_form['image']);
        unset($oshi_form['remove']);
        unset($oshi_form['_token']);
        
        $oshi->fill($oshi_form)->save();
        return redirect('admin/oshi/');
    }
    public function delete(Request $request)
    {
        $oshi = Oshi::find($request->id);
        $oshi->delete();
        return redirect('admin/oshi/');
    }
}
