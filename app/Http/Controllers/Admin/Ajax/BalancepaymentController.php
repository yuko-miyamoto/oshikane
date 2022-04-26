<?php

namespace App\Http\Controllers\Admin\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Expense;
use App\Budget;
use App\User;
use Auth;
use Carbon\carbon;

class BalancepaymentController extends Controller
{
     public function chartindex(Request $request)
    {
        // プルダウン絞り込み1
        $years = $request->get('year');
        // プルダウン絞り込み2
        $oshi_id = $request->get('oshi_id'); 
        // パラメーターでの絞り込み
        $user_id = $request->get('user_id'); 
        // 自分の支出と予算のグラフ画面を表示する場合はログインidを格納
        if($user_id == '') {
            $user_id = Auth::id();
        }
        // 選択された年度で予算が登録されている月を取得
        $month = Budget::where('register_year', $years)->where('user_id', $user_id)->pluck('register_month');
        // 選択された年度で登録されている予算を取得
        $stagebudgets = Budget::where('register_year', $years)->where('user_id', $user_id)->pluck('stage');
        $concertbudgets = Budget::where('register_year', $years)->where('user_id', $user_id)->pluck('concert');
        $webbudgets = Budget::where('register_year', $years)->where('user_id', $user_id)->pluck('web');
        $moviebudgets = Budget::where('register_year', $years)->where('user_id', $user_id)->pluck('movie');
        $cdbudgets = Budget::where('register_year', $years)->where('user_id', $user_id)->pluck('cd');
        $dvdbudgets = Budget::where('register_year', $years)->where('user_id', $user_id)->pluck('dvd');
        $magazinebudgets = Budget::where('register_year', $years)->where('user_id', $user_id)->pluck('magazine');
        $trainbudgets = Budget::where('register_year', $years)->where('user_id', $user_id)->pluck('train');
        $travelbudgets = Budget::where('register_year', $years)->where('user_id', $user_id)->pluck('travel');
        $toybudgets = Budget::where('register_year', $years)->where('user_id', $user_id)->pluck('toy');
        $othersbudgets = Budget::where('register_year', $years)->where('user_id', $user_id)->pluck('others');
        
        // 選択された年度より前で直近の予算を取得
        $beforemonth = Budget::where('register_year', '<', $years )->where('user_id', $user_id)->orderBy('id', 'desc')->first();
       
        $beforestagebudgets = Budget::where('register_year', '<', $years )->where('user_id', $user_id)->orderBy('id', 'desc')->pluck('stage')->first();
        $beforeconcertbudgets = Budget::where('register_year', '<', $years )->where('user_id', $user_id)->orderBy('id', 'desc')->pluck('concert')->first();
        $beforewebbudgets = Budget::where('register_year', '<', $years )->where('user_id', $user_id)->orderBy('id', 'desc')->pluck('web')->first();
        $beforemoviebudgets = Budget::where('register_year', '<', $years )->where('user_id', $user_id)->orderBy('id', 'desc')->pluck('movie')->first();
        $beforecdbudgets = Budget::where('register_year', '<', $years )->where('user_id', $user_id)->orderBy('id', 'desc')->pluck('cd')->first();
        $beforedvdbudgets = Budget::where('register_year', '<', $years )->where('user_id', $user_id)->orderBy('id', 'desc')->pluck('dvd')->first();
        $beforemagazinebudgets = Budget::where('register_year', '<', $years )->where('user_id', $user_id)->orderBy('id', 'desc')->pluck('magazine')->first();
        $beforetrainbudgets = Budget::where('register_year', '<', $years )->where('user_id', $user_id)->orderBy('id', 'desc')->pluck('train')->first();
        $beforetravelbudgets = Budget::where('register_year', '<', $years )->where('user_id', $user_id)->orderBy('id', 'desc')->pluck('travel')->first();
        $beforetoybudgets = Budget::where('register_year', '<', $years )->where('user_id', $user_id)->orderBy('id', 'desc')->pluck('toy')->first();
        $beforeothersbudgets = Budget::where('register_year', '<', $years )->where('user_id', $user_id)->orderBy('id', 'desc')->pluck('others')->first();
        
        // 各月の予算を格納する配列
        $years_budgets = [];
        
        // 年間予算配列に格納するための月ごとのカテゴリ予算
        $get_year_budget = [
            "budget_stage" => 0,
            "budget_concert" => 0,
            "budget_web" => 0,
            "budget_movie" => 0,
            "budget_cd" => 0,
            "budget_dvd" => 0,
            "budget_magazine" => 0,
            "budget_train" => 0,
            "budget_travel" => 0,
            "budget_toy" => 0,
            "budget_others" => 0
        ];
            
        if( !empty($beforemonth)) {
            // 前年度より前の直近の予算登録が有る場合の一時変数
            $get_year_budget = [
                "budget_stage" => $beforestagebudgets,
                "budget_concert" => $beforeconcertbudgets,
                "budget_web" => $beforewebbudgets,
                "budget_movie" => $beforemoviebudgets,
                "budget_cd" => $beforecdbudgets,
                "budget_dvd" => $beforedvdbudgets,
                "budget_magazine" => $beforemagazinebudgets,
                "budget_train" => $beforetrainbudgets,
                "budget_travel" => $beforetravelbudgets,
                "budget_toy" => $beforetoybudgets,
                "budget_others" => $beforeothersbudgets
            ];    
        }
        // month配列の要素番号
        $month_index = 0;
        
        for($i = 1; $i <= 12; $i++) {
            // $beforemonthが空
            if( count($month) != 0) {
                // カウントと$monthがイコールの場合
                if ( $i == $month[$month_index] ) {
                    // 予算の一時変数の値を該当月の予算に更新
                    $get_year_budget = [
                        "budget_stage" => $stagebudgets[$month_index],
                        "budget_concert" => $concertbudgets[$month_index],
                        "budget_web" => $webbudgets[$month_index],
                        "budget_movie" => $moviebudgets[$month_index],
                        "budget_cd" => $cdbudgets[$month_index],
                        "budget_dvd" => $dvdbudgets[$month_index],
                        "budget_magazine" => $magazinebudgets[$month_index],
                        "budget_train" => $trainbudgets[$month_index],
                        "budget_travel" => $travelbudgets[$month_index],
                        "budget_toy" => $toybudgets[$month_index],
                        "budget_others" => $othersbudgets[$month_index]
                    ];
                    if ( 1 < count($month)) {
                        $month_index++;
                    }
                }
                
            }
            $years_budgets[] = $get_year_budget;
        }
        
        for($i = 1; $i <= 12; $i++) {
            // 
            if($user_id != '' && $oshi_id != 'all' && $years != '') {
                
                $stage_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', $user_id)->where('oshi_id', $oshi_id)->sum("stage");
                $concert_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', $user_id)->where('oshi_id', $oshi_id)->sum("concert");
                $web_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', $user_id)->where('oshi_id', $oshi_id)->sum("web");
                $movie_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', $user_id)->where('oshi_id', $oshi_id)->sum("movie");
                $cd_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', $user_id)->where('oshi_id', $oshi_id)->sum("cd");
                $dvd_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', $user_id)->where('oshi_id', $oshi_id)->sum("dvd");
                $magazine_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', $user_id)->where('oshi_id', $oshi_id)->sum("magazine");
                $train_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', $user_id)->where('oshi_id', $oshi_id)->sum("train");
                $travel_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', $user_id)->where('oshi_id', $oshi_id)->sum("travel");
                $toy_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', $user_id)->where('oshi_id', $oshi_id)->sum("toy");
                $others_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', $user_id)->where('oshi_id', $oshi_id)->sum("others");
                    
            } elseif($user_id != '' && $years != '') {
                
                $stage_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', $user_id)->sum("stage");
                $concert_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', $user_id)->sum("concert");
                $web_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', $user_id)->sum("web");
                $movie_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', $user_id)->sum("movie");
                $cd_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', $user_id)->sum("cd");
                $dvd_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', $user_id)->sum("dvd");
                $magazine_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', $user_id)->sum("magazine");
                $train_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', $user_id)->sum("train");
                $travel_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', $user_id)->sum("travel");
                $toy_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', $user_id)->sum("toy");
                $others_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', $user_id)->sum("others");
                    
            }
            $balance_payments = [
                "expense_stage" => $stage_sum,
                "expense_concert" => $concert_sum,
                "expense_web" => $web_sum,
                "expense_movie" => $movie_sum,
                "expense_cd" => $cd_sum,
                "expense_dvd" => $dvd_sum,
                "expense_magazine" => $magazine_sum,
                "expense_train" => $train_sum,
                "expense_travel" => $travel_sum,
                "expense_toy" => $toy_sum,
                "expense_others" => $others_sum,
                "budget_stage" => array_sum(array_column($years_budgets, 'budget_stage')),
                "budget_concert" => array_sum(array_column($years_budgets, 'budget_concert')),
                "budget_web" => array_sum(array_column($years_budgets, 'budget_web')),
                "budget_movie" => array_sum(array_column($years_budgets, 'budget_movie')),
                "budget_cd" => array_sum(array_column($years_budgets, 'budget_cd')),
                "budget_dvd" => array_sum(array_column($years_budgets, 'budget_dvd')),
                "budget_magazine" => array_sum(array_column($years_budgets, 'budget_magazine')),
                "budget_train" => array_sum(array_column($years_budgets, 'budget_train')),
                "budget_travel" => array_sum(array_column($years_budgets, 'budget_travel')),
                "budget_toy" => array_sum(array_column($years_budgets, 'budget_toy')),
                "budget_others" => array_sum(array_column($years_budgets, 'budget_others'))
            ];
            
        }
        
        return response()->json($balance_payments);
    }
   
    //
}