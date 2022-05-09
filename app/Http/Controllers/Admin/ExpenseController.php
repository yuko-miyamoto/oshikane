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

class ExpenseController extends Controller
{
    //
    public function add()
    {
        $oshis = Oshi::where('user_id', Auth::id())->get();
        
        return view('admin.expense.create',['oshis' => $oshis,]);
    }
    
     public function create(Request $request)
    {
        $this->validate($request, Expense::$rules);
        $expense = new Expense;
        $form = $request->all();
        
        $oshis = Oshi::find($request->id);
        
        $expense->fill($form);
        $expense->save();
        
        return redirect('admin/expense/create');
    }
    
    public function index(Request $request)
    {
        // プルダウン絞り込み1
        $get_year = $request->get('year');
        // プルダウン絞り込み2
        $category_name = $request->get('category_name');
        // プルダウン絞り込み3
        $oshi_id = $request->get('oshi_id');
        // パラメーターから絞り込み
        $user_id = $request->get('user_id');
        // 自分の支出一覧を表示する場合はログインidを格納
        if($user_id == ''){
            $user_id = Auth::id();
        }
        // 支出テーブルから支払い日を取得
        $dates = Expense::where('user_id', $user_id)->pluck('paid_at');
        // 一覧表示する際に取得する年度の初期値
        $years = null;
        // プルダウンに自分の登録している推しを格納
        $oshis = User::find($user_id);
        // 支払い日が0ではない時の処理
        if(count($dates) != 0 ) {
            foreach ($dates as $date) {
                $array[] = $date->format('Y');
            }
            $years = collect($array)->unique()->sort()->reverse()->values();    
        }
        
        $query = Expense::query();
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
            $query->where('paid_at', $get_year)->where('user_id', $user_id);
        } 
        else {
            $query->where('user_id', $user_id);
        }
        
        $expenses = $query->orderBy('paid_at', 'desc')->paginate(15);
        
        return view('admin.expense.index', [
            'user_id' => $user_id,
            'category_name' => $category_name,
            'oshi_id' => $oshi_id,
            'oshis' => $oshis,
            'years' => $years,
            'expenses' => $expenses
        ]);
    }
    
    public function edit(Request $request)
    {
        $expenses = Expense::find($request->id);
        $oshis = Oshi::where('user_id', Auth::id())->get();
        if(empty($expenses)) {
            abort(404);
        }
        
        return view('admin.expense.edit',['expense_form' => $expenses, 'oshis' => $oshis]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Expense::$rules);
        $expenses = Expense::find($request->id);
        $expense_form = $request->all();
        
        unset($expense_form['_token']);
        
        $expenses->fill($expense_form)->save();
        
        return redirect('admin/expense/index');
    }
    
    public function delete(Request $request)
    {
        $expenses = Expense::find($request->id);
        $expenses->delete();
        
        return redirect('admin/expense/index');
    }
}
