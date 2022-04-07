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
        
        return view('admin.budget.create',['date' => $date]);
    }
    
    public function create(Request $request)
    {
        $date = Carbon::now();
        
        $check_month = Budget::where('register_month', $date->month)->select('register_month')->get();
        
        $this->validate($request, Budget::$rules);
        $budget = new Budget;
        $form = $request->all();
        
        unset($form['_token']);
        
        if( $check_month < $form['register_month'] ) {
            
            $budget->fill($form);
            $budget->save();
        
        } else {
            false;
        }
        
        return redirect('admin/budget/index');
    }
    
    public function index(Request $request)
    {
        $date = Carbon::now();
        $budgets = Budget::latest('updated_at')->first();
        
        return view('admin.budget/index', ['budgets' => $budgets, 'date' => $date]);
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
