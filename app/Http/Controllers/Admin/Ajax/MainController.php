<?php

namespace App\Http\Controllers\Admin\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Expense;
use App\Budget;
use Auth;
use Carbon\carbon;

class MainController extends Controller
{
     public function profile(Request $request)
    {
        // パラメーターからidを取得
        $user_id = $request->get('id');
        // 現在日時を取得
        $now = Carbon::now();
        
        for($i = 1; $i <= 12; $i++) {
            
            $stage_sum["sum$i"] = Expense::whereYear('paid_at', $now->year)->whereMonth('paid_at', $i)->where('user_id', $user_id)->sum("stage");
            $concert_sum["sum$i"] = Expense::whereYear('paid_at', $now->year)->whereMonth('paid_at', $i)->where('user_id', $user_id)->sum("concert");
            $web_sum["sum$i"] = Expense::whereYear('paid_at', $now->year)->whereMonth('paid_at', $i)->where('user_id', $user_id)->sum("web");
            $movie_sum["sum$i"] = Expense::whereYear('paid_at', $now->year)->whereMonth('paid_at', $i)->where('user_id', $user_id)->sum("movie");
            $cd_sum["sum$i"] = Expense::whereYear('paid_at', $now->year)->whereMonth('paid_at', $i)->where('user_id', $user_id)->sum("cd");
            $dvd_sum["sum$i"] = Expense::whereYear('paid_at', $now->year)->whereMonth('paid_at', $i)->where('user_id', $user_id)->sum("dvd");
            $magazine_sum["sum$i"] = Expense::whereYear('paid_at', $now->year)->whereMonth('paid_at', $i)->where('user_id', $user_id)->sum("magazine");
            $train_sum["sum$i"] = Expense::whereYear('paid_at', $now->year)->whereMonth('paid_at', $i)->where('user_id', $user_id)->sum("train");
            $travel_sum["sum$i"] = Expense::whereYear('paid_at', $now->year)->whereMonth('paid_at', $i)->where('user_id', $user_id)->sum("travel");
            $toy_sum["sum$i"] = Expense::whereYear('paid_at', $now->year)->whereMonth('paid_at', $i)->where('user_id', $user_id)->sum("toy");
            $others_sum["sum$i"] = Expense::whereYear('paid_at', $now->year)->whereMonth('paid_at', $i)->where('user_id', $user_id)->sum("others");
            
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