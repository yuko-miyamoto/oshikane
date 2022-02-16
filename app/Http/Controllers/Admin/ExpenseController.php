<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Expense;
use App\Oshi;
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
        $oshi = new Oshi();
        $oshi->oshi_id = $oshi->id;
        
        dd($oshi);
        
        $stage_sum2 = Expense::where('date', 'like', '2022-02%')->where('oshi_id', '=', 1)->sum("stage");
        $concert_sum2 = Expense::where('date', 'like', '2022-02%')->where('oshi_id', '=', 1)->sum("concert");
        $web_sum2 = Expense::where('date', 'like', '2022-02%')->where('oshi_id', '=', 1)->sum("web");
        $movie_sum2 = Expense::where('date', 'like', '2022-02%')->where('oshi_id', '=', 1)->sum("movie");
        $cd_sum2 = Expense::where('date', 'like', '2022-02%')->where('oshi_id', '=', 1)->sum("cd");
        $dvd_sum2 = Expense::where('date', 'like', '2022-02%')->where('oshi_id', '=', 1)->sum("dvd");
        $magazine_sum2 = Expense::where('date', 'like', '2022-02%')->where('oshi_id', '=', 1)->sum("magazine");
        $train_sum2 = Expense::where('date', 'like', '2022-02%')->where('oshi_id', '=', 1)->sum("train");
        $travel_sum2 = Expense::where('date', 'like', '2022-02%')->where('oshi_id', '=', 1)->sum("travel");
        $toy_sum2 = Expense::where('date', 'like', '2022-02%')->where('oshi_id', '=', 1)->sum("toy");
        $others_sum2 = Expense::where('date', 'like', '2022-02%')->where('oshi_id', '=', 1)->sum("others");
               
        $expense_array2 = [$stage_sum2, $concert_sum2, $web_sum2, $movie_sum2, $cd_sum2, $dvd_sum2, $magazine_sum2, $train_sum2, $travel_sum2, $toy_sum2, $others_sum2];
        
        $stage_sum1 = Expense::where('date', 'like', '2022-01%')->where('oshi_id', '=', 1)->sum("stage");
        $concert_sum1 = Expense::where('date', 'like', '2022-01%')->where('oshi_id', '=', 1)->sum("concert");
        $web_sum1 = Expense::where('date', 'like', '2022-01%')->where('oshi_id', '=', 1)->sum("web");
        $movie_sum1 = Expense::where('date', 'like', '2022-01%')->where('oshi_id', '=', 1)->sum("movie");
        $cd_sum1 = Expense::where('date', 'like', '2022-01%')->where('oshi_id', '=', 1)->sum("cd");
        $dvd_sum1 = Expense::where('date', 'like', '2022-01%')->where('oshi_id', '=', 1)->sum("dvd");
        $magazine_sum1 = Expense::where('date', 'like', '2022-01%')->where('oshi_id', '=', 1)->sum("magazine");
        $train_sum1 = Expense::where('date', 'like', '2022-01%')->where('oshi_id', '=', 1)->sum("train");
        $travel_sum1 = Expense::where('date', 'like', '2022-01%')->where('oshi_id', '=', 1)->sum("travel");
        $toy_sum1 = Expense::where('date', 'like', '2022-01%')->where('oshi_id', '=', 1)->sum("toy");
        $others_sum1 = Expense::where('date', 'like', '2022-01%')->where('oshi_id', '=', 1)->sum("others");
               
        $expense_array1 = [$stage_sum1, $concert_sum1, $web_sum1, $movie_sum1, $cd_sum1, $dvd_sum1, $magazine_sum1, $train_sum1, $travel_sum1, $toy_sum1, $others_sum1];    
           
        
        return view('admin.expense.index',['expense_array2' => $expense_array2, 'expense_array1' => $expense_array1, 'posts' => $posts, 'oshis' => $oshis]);
    }
    
    
   
}
