<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Expense;
use App\Budget;
use App\Category;
use App\Oshi;
use App\User;
use carbon\Carbon;
use Auth;

class ExpenseController extends Controller
{
    //
    public function add()
    {
        $oshis = Oshi::where('user_id', Auth::id() )->get();
        
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
        $login_user = $request->get('user_id');
        
        if ($login_user != '') {
            $oshis = User::find($login_user);
        } else {
            $oshis = user::find(Auth::id() );
        }
        
        
        $dates = Expense::pluck('paid_at');
        foreach ($dates as $date) {
            $array[] = $date->format('Y');
        }
        $years = collect($array)->unique()->sort()->reverse()->values();
        
        $budgets = Budget::find(Auth::id() )->toArray();
        unset($budgets['id']);
        unset($budgets['total_budget']);
        unset($budgets['user_id']);
        unset($budgets['oshi_id']);
        unset($budgets['created_at']);
        unset($budgets['updated_at']);
        
        
        return view('admin.expense.index',['oshis' => $oshis, 'years' => $years, 'budgets' => $budgets]);
    }
    
    public function expenseindex(Request $request)
    {
        $category = new Category;
        $categories = $category->getLists();
        $category_id = $request->input('category_id');
        $oshi_id = $request->input('oshi_id');
        $login_user = $request->get('user_id');
        
        if ($login_user != '') {
            $oshis = User::find($login_user);
        } else {
            $oshis = user::find(Auth::id() );
        }
        
        $dates = Expense::pluck('paid_at');
        foreach ($dates as $date) {
            $array[] = $date->format('Y');
        }
        $years = collect($array)->unique()->sort()->reverse()->values();
        
        $query = Expense::query();
        if (isset($category_id)) {
            $query->where('category_id', $category_id);
        } elseif (isset($years)) {
            $query->whereYear('paid_at', $years);
        } elseif (isset($oshi_id)) {
            $query->where('oshi_id', $oshi_id);
        }
        
        
        $expenses = $query->orderBy('category_id', 'asc')->paginate(15);
        
        
        
        return view('admin.expense.expenseindex', ['categories' => $categories, 'category_id' => $category_id, 'oshi_id' => $oshi_id, 'oshis' => $oshis, 'years' => $years, 'expenses' => $expenses]);
    }
}
