<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Budget;
use App\User;
use Auth;
use Carbon\Carbon;

class BudgetController extends Controller
{
    //
    public function add()
    {
        $date = Carbon::now();
        
        $check_month = Budget::where('register_year', $date->year)->where('user_id', Auth::id() )->select('register_month')->orderBy('id', 'desc')->first();
        
        
        return view('admin.budget.create',['date' => $date, 'check_month' => $check_month]);
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Budget::$rules);
        $budget = new Budget;
        $form = $request->all();
        
        unset($form['_token']);
            
        $budget->fill($form);
        $budget->save();
        
        return redirect('admin/budget/index');
    }
    
    public function index(Request $request)
    {
        $date = Carbon::now();
        
        $budget_message = "予算を登録してください。";
            
        $budgets = Budget::where('user_id', Auth::id() )->orderBy('id', 'desc')->first();
        
        if(isset($budgets)) {
            $budgets = Budget::where('user_id', Auth::id() )->orderBy('id', 'desc')->first();
        } else {
            $budget_message;
        }
        return view('admin.budget.index', ['budgets' => $budgets, 'date' => $date, 'budget_message' => $budget_message]);
    }
    
    public function edit(Request $request)
    {
        $budgets = Budget::find($request->id);
        if (empty($budgets)) {
            abort(404);
        }
        
        return view('admin.budget.edit',['budget_form' => $budgets]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Budget::$rules);
        $budgets = Budget::find($request->id);
        $budget_form = $request->all();
        
        unset($budget_form['_token']);
        
        $budgets->fill($budget_form)->save();
        
        return redirect('admin/budget/index');
    }
    
    public function delete(Request $request)
    {
        $budgets = Budget::find($request->id);
        $budgets->delete();
        
        return redirect('admin/budget/index');
    }
}
