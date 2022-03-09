<?php

namespace App\Http\Controllers\Admin\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Expense;
use Auth;

class ExpenseController extends Controller
{
     public function index(Request $request)
    {
        $oshi_id = $request->get('oshi_id');
        $years = $request->get('year');
        
        
        for($i = 1; $i <= 12; $i++) {
            
            $stage_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', Auth::id() )->where('oshi_id', $oshi_id)->sum("stage");
            $concert_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', Auth::id() )->where('oshi_id', $oshi_id)->sum("concert");
            $web_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', Auth::id() )->where('oshi_id', $oshi_id)->sum("web");
            $movie_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', Auth::id() )->where('oshi_id', $oshi_id)->sum("movie");
            $cd_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', Auth::id() )->where('oshi_id', $oshi_id)->sum("cd");
            $dvd_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', Auth::id() )->where('oshi_id', $oshi_id)->sum("dvd");
            $magazine_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', Auth::id() )->where('oshi_id', $oshi_id)->sum("magazine");
            $train_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', Auth::id() )->where('oshi_id', $oshi_id)->sum("train");
            $travel_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', Auth::id() )->where('oshi_id', $oshi_id)->sum("travel");
            $toy_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', Auth::id() )->where('oshi_id', $oshi_id)->sum("toy");
            $others_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', Auth::id() )->where('oshi_id', $oshi_id)->sum("others");
            
            $expense_array = [
                "stage" => $stage_sum,
                "concert" => $concert_sum,
                "web" => $web_sum,
                "movie" => $movie_sum,
                "cd" => $cd_sum,
                "dvd" => $dvd_sum,
                "magazine" => $magazine_sum,
                "train" => $train_sum,
                "travel" => $travel_sum,
                "toy" => $toy_sum,
                "others" => $others_sum
                ];
        }
       return response()->json($expense_array);
    }
   
    //
}
