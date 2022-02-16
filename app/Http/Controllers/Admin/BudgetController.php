<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Budget;
use Auth;

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
       
        $budget->fill($form);
        $budget->save();
        
        return redirect('admin/budget/create');
    }
}
