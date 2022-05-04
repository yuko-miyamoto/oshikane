<?php

namespace App\Http\Controllers\Admin\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Expense;
use App\Saving;
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
            
            $expense_stage_sum["sum$i"] = Expense::whereYear('paid_at', $now->year)->whereMonth('paid_at', $i)->where('user_id', $user_id)->sum("stage");
            $expense_concert_sum["sum$i"] = Expense::whereYear('paid_at', $now->year)->whereMonth('paid_at', $i)->where('user_id', $user_id)->sum("concert");
            $expense_web_sum["sum$i"] = Expense::whereYear('paid_at', $now->year)->whereMonth('paid_at', $i)->where('user_id', $user_id)->sum("web");
            $expense_movie_sum["sum$i"] = Expense::whereYear('paid_at', $now->year)->whereMonth('paid_at', $i)->where('user_id', $user_id)->sum("movie");
            $expense_cd_sum["sum$i"] = Expense::whereYear('paid_at', $now->year)->whereMonth('paid_at', $i)->where('user_id', $user_id)->sum("cd");
            $expense_dvd_sum["sum$i"] = Expense::whereYear('paid_at', $now->year)->whereMonth('paid_at', $i)->where('user_id', $user_id)->sum("dvd");
            $expense_magazine_sum["sum$i"] = Expense::whereYear('paid_at', $now->year)->whereMonth('paid_at', $i)->where('user_id', $user_id)->sum("magazine");
            $expense_train_sum["sum$i"] = Expense::whereYear('paid_at', $now->year)->whereMonth('paid_at', $i)->where('user_id', $user_id)->sum("train");
            $expense_travel_sum["sum$i"] = Expense::whereYear('paid_at', $now->year)->whereMonth('paid_at', $i)->where('user_id', $user_id)->sum("travel");
            $expense_toy_sum["sum$i"] = Expense::whereYear('paid_at', $now->year)->whereMonth('paid_at', $i)->where('user_id', $user_id)->sum("toy");
            $expense_others_sum["sum$i"] = Expense::whereYear('paid_at', $now->year)->whereMonth('paid_at', $i)->where('user_id', $user_id)->sum("others");
            $saving_stage_sum["sum$i"] = Saving::whereYear('stocked_at', $now->year)->whereMonth('stocked_at', $i)->where('user_id', $user_id )->sum("stage");
            $saving_concert_sum["sum$i"] = Saving::whereYear('stocked_at', $now->year)->whereMonth('stocked_at', $i)->where('user_id', $user_id )->sum("concert");
            $saving_web_sum["sum$i"] = Saving::whereYear('stocked_at', $now->year)->whereMonth('stocked_at', $i)->where('user_id', $user_id )->sum("web");
            $saving_movie_sum["sum$i"] = Saving::whereYear('stocked_at', $now->year)->whereMonth('stocked_at', $i)->where('user_id', $user_id )->sum("movie");
            $saving_cd_sum["sum$i"] = Saving::whereYear('stocked_at', $now->year)->whereMonth('stocked_at', $i)->where('user_id', $user_id )->sum("cd");
            $saving_dvd_sum["sum$i"] = Saving::whereYear('stocked_at', $now->year)->whereMonth('stocked_at', $i)->where('user_id', $user_id )->sum("dvd");
            $saving_magazine_sum["sum$i"] = Saving::whereYear('stocked_at', $now->year)->whereMonth('stocked_at', $i)->where('user_id', $user_id )->sum("magazine");
            $saving_media_sum["sum$i"] = Saving::whereYear('stocked_at', $now->year)->whereMonth('stocked_at', $i)->where('user_id', $user_id )->sum("media");
            $saving_others_sum["sum$i"] = Saving::whereYear('stocked_at', $now->year)->whereMonth('stocked_at', $i)->where('user_id', $user_id )->sum("others");
            
            
            $value_array = [
                "expense_stage" => $expense_stage_sum,
                "expense_concert" => $expense_concert_sum,
                "expense_web" => $expense_web_sum,
                "expense_movie" => $expense_movie_sum,
                "expense_cd" => $expense_cd_sum,
                "expense_dvd" => $expense_dvd_sum,
                "expense_magazine" => $expense_magazine_sum,
                "expense_train" => $expense_train_sum,
                "expense_travel" => $expense_travel_sum,
                "expense_toy" => $expense_toy_sum,
                "expense_others" => $expense_others_sum,
                "saving_stage" => $saving_stage_sum,
                "saving_concert" => $saving_concert_sum,
                "saving_web" => $saving_web_sum,
                "saving_movie" => $saving_movie_sum,
                "saving_cd" => $saving_cd_sum,
                "saving_dvd" => $saving_dvd_sum,
                "saving_magazine" => $saving_magazine_sum,
                "saving_media" => $saving_media_sum,
                "saving_others" => $saving_others_sum,
                ];
        }
       return response()->json($value_array);
    }
   
    //
}