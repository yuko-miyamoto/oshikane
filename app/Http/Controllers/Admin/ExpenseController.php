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
        $category = new Category;
        $categories = $category->getLists();
        $category_id = $request->get('category_id');
        $get_year = $request->get('year');
        $oshi_id = $request->get('oshi_id');
        $user_id = $request->get('user_id');
        
        if ($user_id != '') {
            
            $oshis = User::find($user_id);
            
        } else {
            
            $oshis = user::find(Auth::id() );
        }
        
        $dates = Expense::pluck('paid_at');
        
        foreach ($dates as $date) {
            
            $array[] = $date->format('Y');
        }
        
        $years = collect($array)->unique()->sort()->reverse()->values();
        
        $query = Expense::query();
        
        if(isset($category_id) && $user_id != '') {
            
            $query->where('category_id', $category_id)->where('user_id', $user_id);
                
        } elseif(isset($category_id) && $user_id == '') {
            
            $query->where('category_id', $category_id)->where('user_id', Auth::id() );
            
        } elseif(isset($get_year) && $user_id != '') {
            
            $query->whereYear('paid_at', $get_year)->where('user_id', $user_id);
            
        } elseif(isset($get_year) && $user_id == '') {
            
            $query->whereYear('paid_at', $get_year)->where('user_id', Auth::id() );
            
        } elseif($oshi_id != 'all' && $user_id != '') {
            
            $query->where('oshi_id', $oshi_id)->where('user_id', $user_id);
            
        } elseif($oshi_id != 'all' && $user_id == '') {
            
            $query->where('oshi_id', $oshi_id)->where('user_id', Auth::id() );
            
        } elseif(isset($category_id) && isset($get_year) && $user_id != '') {
            
            $query->where('category_id', $category_id)->whereYear('paid_at', $get_year)->where('user_id', $user_id);
            
        } elseif(isset($category_id) && isset($get_year) && $user_id == '') {
            
            $query->where('category_id', $category_id)->whereYear('paid_at', $get_year)->where('user_id', Auth::id() );
            
        } elseif(isset($category_id) && isset($oshi_id) && $user_id != '') {
            
            $query->where('category_id', $category_id)->where('oshi_id', $oshi_id)->where('user_id', $user_id);
            
        } elseif(isset($category_id) && isset($oshi_id) && $user_id == '') {
            
            $query->where('category_id', $category_id)->where('oshi_id', $oshi_id)->where('user_id', Auth::id() );
            
        } elseif($user_id != '') {
            
            $query->where('user_id', $user_id);
        
        } else {
            
            $query->where('user_id', Auth::id() );
        }
        
        $expenses = $query->orderBy('category_id', 'asc')->orderBy('paid_at', 'desc')->paginate(15);
        
        return view('admin.expense.index', [
            'user_id' => $user_id,
            'categories' => $categories,
            'category_id' => $category_id,
            'oshi_id' => $oshi_id,
            'oshis' => $oshis,
            'years' => $years,
            'expenses' => $expenses]);
    }
}
