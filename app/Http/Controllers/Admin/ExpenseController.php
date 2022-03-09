<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Expense;
use App\Oshi;
use App\User;
use carbon\Carbon;
use Auth;

class ExpenseController extends Controller
{
    //
    public function add()
    {
        $posts = Oshi::where('user_id', Auth::id())->get();
        
        return view('admin.expense.create',['posts' => $posts,]);
    }
    
     public function create(Request $request)
    {
        $this->validate($request, Expense::$rules);
        $expense = new Expense;
        $form = $request->all();
        
        $posts = Oshi::find($request->id);
        
        
        $expense->fill($form);
        $expense->save();
        
        return redirect('admin/expense/create');
    }
    
    public function index(Request $request) 
    {
        $login_user = User::find(Auth::id() );
        $dates = Expense::pluck('paid_at');
        foreach ($dates as $date) {
            $array[] = $date->format('Y');
        }
        $years = collect($array)->unique()->sort()->reverse()->values();
        
        return view('admin.expense.index',['login_user' => $login_user, 'years' => $years]);
    }
    
}
