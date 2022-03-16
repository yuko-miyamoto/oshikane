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
        return view('admin.budget.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Budget::$rules);
        $budget = new Budget;
        $form = $request->all();
        
        $date = Carbon::now();
        $budget->register_year = $date->year;
        $budget->register_month = $date->month;
        
        $budget->fill($form);
        $budget->save();
        
        return redirect('admin/budget/index');
    }
    
    public function index(Request $request)
    {
        $budgets = Budget::latest('updated_at')->first();
        
        return view('admin.budget/index', ['budgets' => $budgets]);
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
}
