<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Saving;
use App\Oshi;
use App\User;
use Auth;

class SavingController extends Controller
{
    //
    public function add()
    {
        $oshis = Oshi::where('user_id', Auth::id())->get();
        
        return view('admin.saving.create', ['oshis' => $oshis,]);
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Saving::$rules);
        $saving = new Saving;
        $form = $request->all();
        
        $oshis = Oshi::find($request->id);
        
        $saving->fill($form);
        $saving->save();
        
        return redirect('admin/saving/create');
    }
    
    public function index(Request $request) 
    {
        // パラメーターからuser_idを取得
        $user_id = $request->get('user_id');
        // 自分の貯金グラフを表示する場合はログインidを格納
        if($user_id == ''){
            $user_id = Auth::id();
        }
        // プルダウンに自分が登録している推しを格納
        $oshis = User::find($user_id);
        // グラフ表示する際に取得する年度の初期値
        $years = null;
        // 貯金テーブルの貯金日を取得
        $dates = Saving::where('user_id', $user_id)->pluck('stocked_at');
        // 貯金日が0ではない時の処理
        if(count($dates) != 0 ) {
            foreach ($dates as $date) {
                $array[] = $date->format('Y');
            }
            $years = collect($array)->unique()->sort()->reverse()->values();    
        }
        
        return view('admin.saving.index',['oshis' => $oshis, 'user_id' => $user_id, 'years' => $years]);
    }
    
    public function detail_index(Request $request)
    {
        // プルダウン絞り込み1
        $get_year = $request->get('year');
        // プルダウン絞り込み2
        $category_name = $request->get('category_name');
        // プルダウン絞り込み3
        $oshi_id = $request->get('oshi_id');
        // パラメーターから絞り込み
        $user_id = $request->get('user_id');
        // 自分の貯金一覧を表示する場合はログインidを格納
        if($user_id == ''){
            $user_id = Auth::id();
        }
        // 貯金テーブルから支払い日を取得
        $dates = Saving::where('user_id', $user_id)->pluck('stocked_at');
        // 一覧表示する際に取得する年度の初期値
        $years = null;
        // プルダウンに自分の登録している推しを格納
        $oshis = User::find($user_id);
        // 貯金日が0ではない時の処理
        if(count($dates) != 0 ) {
            foreach ($dates as $date) {
                $array[] = $date->format('Y');
            }
            $years = collect($array)->unique()->sort()->reverse()->values();    
        }
        
        $query = Saving::query();
        // 推しが全選択ではないかつnullではない場合
        if($oshi_id != 'all' && $oshi_id != null) {
            $query->where([
                ['oshi_id', $oshi_id],
                ['user_id', $user_id]
            ]);
        } 
        // カテゴリを選択している場合
        if ($category_name != '') {
            $query->where('user_id', $user_id)->whereNotNull($category_name);
        } 
        // 年度を選択している場合
        if($get_year != '') {
            $query->whereYear('stocked_at', $get_year)->where('user_id', $user_id);
        } 
        else {
            $query->where('user_id', $user_id);
        }
        
        $savings = $query->orderBy('stocked_at', 'desc')->paginate(15);
        
        return view('admin.saving.detail_index', [
            'user_id' => $user_id,
            'category_name' => $category_name,
            'oshi_id' => $oshi_id,
            'oshis' => $oshis,
            'years' => $years,
            'savings' => $savings
        ]);    
    }
    
    public function edit(Request $request)
    {
        $savings = Saving::find($request->id);
        $oshis = Oshi::where('user_id', Auth::id())->get();
        if(empty($savings)) {
            abort(404);
        }
        
        return view('admin.saving.edit',['saving_form' => $savings, 'oshis' => $oshis]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Saving::$rules);
        $savings = Saving::find($request->id);
        $saving_form = $request->all();
        
        unset($saving_form['_token']);
        
        $savings->fill($saving_form)->save();
        
        return redirect('admin/saving/detail_index');
    }
    
    public function delete(Request $request)
    {
        $savings = Saving::find($request->id);
        $savings->delete();
        
        return redirect('admin/saving/detail_index');
    }
}
