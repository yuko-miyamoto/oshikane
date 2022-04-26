<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Expense;
use App\Budget;
use App\Category;
use App\Oshi;
use App\User;
use Carbon\carbon;
use Auth;

class BalancepaymentController extends Controller
{
    //
    public function chartindex(Request $request)
    {
        // パラメーターからuser_idを取得
        $user_id = $request->get('user_id');
        // 自分のグラフを表示する場合はログインidを格納
        if($user_id == ''){
            $user_id = Auth::id();
        }
        // プルダウンに自分が登録している推しを格納
        $oshis = User::find($user_id);
        // グラフ表示する際に取得する年度の初期値
        $years = null;
        // 支出テーブルの支払い日を取得
        $dates = Expense::where('user_id', $user_id)->pluck('paid_at');
        // 支払日が0ではない時の処理
        if(count($dates) != 0 ) {
            foreach ($dates as $date) {
                $array[] = $date->format('Y');
            }
            $years = collect($array)->unique()->sort()->reverse()->values();    
        }
        
        return view('admin.balancepayment.index', ['oshis' => $oshis, 'years' => $years, 'user_id' => $user_id]);
    }
}
