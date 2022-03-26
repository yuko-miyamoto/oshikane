<?php

namespace App\Http\Controllers\Admin\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Expense;
use App\Budget;
use Auth;
use Carbon\carbon;

class ExpenseController extends Controller
{
     public function index(Request $request)
    {
        $years = $request->get('year');      // プルダウン絞り込み1
        $oshi_id = $request->get('oshi_id'); // プルダウン絞り込み2
        $user_id = $request->get('user_id'); // パラメーターでの絞り込み
        $now = Carbon::now();
        
        $month = Budget::where('register_year', 2021)->pluck('register_month');                     // 選択された年度で予算が登録されている月を取得
        $beforemonth = Budget::where('register_year', '<', 2021 )->orderBy('id', 'desc')->first();  // 選択された年度以下で直近の予算登録の有無を確認
        $month_budgets = [];                                                                        // 各月の予算を格納する配列
        $budget = 0;                                                                                // 予算の一時変数
        $month_index = 0;                                                                           // month配列の要素番号
        
        for( $i = 1; $i <= 12; $i++ ) {
            // $beforemonthがnull かつ $month[0] が 1月でないときの処理
            if( is_null($beforemonth) && $month[0] != 1 ) {
                
                if( $i == $month[$month_index] ) { // 指定月が$monthに含まれている場合
                
                    $stagebudgets = Budget::where('register_year',2021)->pluck('stage');
                    $concertbudgets = Budget::where('register_year',2021)->pluck('concert');
                    $webbudgets = Budget::where('register_year',2021)->pluck('web');
                    $moviebudgets = Budget::where('register_year',2021)->pluck('movie');
                    $cdbudgets = Budget::where('register_year',2021)->pluck('cd');
                    $dvdbudgets = Budget::where('register_year',2021)->pluck('dvd');
                    $magazinebudgets = Budget::where('register_year',2021)->pluck('magazine');
                    $trainbudgets = Budget::where('register_year',2021)->pluck('train');
                    $travelbudgets = Budget::where('register_year',2021)->pluck('travel');
                    $toybudgets = Budget::where('register_year',2021)->pluck('toy');
                    $othersbudgets = Budget::where('register_year',2021)->pluck('others');
                    
                    // 予算の一時変数の値を該当月の予算に更新
                    $budget = [
                        "stage" => $stagebudgets[$month_index],
                        "concert" => $concertbudgets[$month_index],
                        "web" => $webbudgets[$month_index],
                        "movie" => $moviebudgets[$month_index],
                        "cd" => $cdbudgets[$month_index],
                        "dvd" => $dvdbudgets[$month_index],
                        "magazine" => $magazinebudgets[$month_index],
                        "train" => $trainbudgets[$month_index],
                        "travel" => $travelbudgets[$month_index],
                        "toy" => $toybudgets[$month_index],
                        "others" => $othersbudgets[$month_index]
                    ];
                    
                    $month_index++;
                    
                }
                
                $month_budgets[] = $budget;
                
            }
        }
        $all_budgets = [
                "stage" => array_sum(array_column($month_budgets, 'stage')),
                "concert" => array_sum(array_column($month_budgets, 'concert')),
                "web" => array_sum(array_column($month_budgets, 'web')),
                "movie" => array_sum(array_column($month_budgets, 'movie')),
                "cd" => array_sum(array_column($month_budgets, 'cd')),
                "dvd" => array_sum(array_column($month_budgets, 'dvd')),
                "magazine" => array_sum(array_column($month_budgets, 'magazine')),
                "train" => array_sum(array_column($month_budgets, 'train')),
                "travel" => array_sum(array_column($month_budgets, 'travel')),
                "toy" => array_sum(array_column($month_budgets, 'toy')),
                "others" => array_sum(array_column($month_budgets, 'others'))
        ];
        
        for( $i = 1; $i <= 12; $i++ ) {
                // $monthの先頭に"1"を追加
                $month->prepend('1');
                    // $iに$monthが含まれている
                    if( $i == $month[$month_index] ) { 
                
                        $stagebudgets = Budget::where('register_year',2021)->pluck('stage');
                        $concertbudgets = Budget::where('register_year',2021)->pluck('concert');
                        $webbudgets = Budget::where('register_year',2021)->pluck('web');
                        $moviebudgets = Budget::where('register_year',2021)->pluck('movie');
                        $cdbudgets = Budget::where('register_year',2021)->pluck('cd');
                        $dvdbudgets = Budget::where('register_year',2021)->pluck('dvd');
                        $magazinebudgets = Budget::where('register_year',2021)->pluck('magazine');
                        $trainbudgets = Budget::where('register_year',2021)->pluck('train');
                        $travelbudgets = Budget::where('register_year',2021)->pluck('travel');
                        $toybudgets = Budget::where('register_year',2021)->pluck('toy');
                        $othersbudgets = Budget::where('register_year',2021)->pluck('others');
                        
                        $beforestagebudgets = Budget::where('register_year', '<', 2021 )->orderBy('id', 'desc')->pluck('stage')->first();
                        $beforeconcertbudgets = Budget::where('register_year', '<', 2021 )->orderBy('id', 'desc')->pluck('concert')->first();
                        $beforewebbudgets = Budget::where('register_year', '<', 2021 )->orderBy('id', 'desc')->pluck('web')->first();
                        $beforemoviebudgets = Budget::where('register_year', '<', 2021 )->orderBy('id', 'desc')->pluck('movie')->first();
                        $beforecdbudgets = Budget::where('register_year', '<', 2021 )->orderBy('id', 'desc')->pluck('cd')->first();
                        $beforedvdbudgets = Budget::where('register_year', '<', 2021 )->orderBy('id', 'desc')->pluck('dvd')->first();
                        $beforemagazinebudgets = Budget::where('register_year', '<', 2021 )->orderBy('id', 'desc')->pluck('magazine')->first();
                        $beforetrainbudgets = Budget::where('register_year', '<', 2021 )->orderBy('id', 'desc')->pluck('train')->first();
                        $beforetravelbudgets = Budget::where('register_year', '<', 2021 )->orderBy('id', 'desc')->pluck('travel')->first();
                        $beforetoybudgets = Budget::where('register_year', '<', 2021 )->orderBy('id', 'desc')->pluck('toy')->first();
                        $beforeothersbudgets = Budget::where('register_year', '<', 2021 )->orderBy('id', 'desc')->pluck('others')->first();
                        
                        $stagebudgets->prepend($beforestagebudgets);
                        $concertbudgets->prepend($beforeconcertbudgets);
                        $webbudgets->prepend($beforewebbudgets);
                        $moviebudgets->prepend($beforemoviebudgets);
                        $cdbudgets->prepend($beforecdbudgets);
                        $dvdbudgets->prepend($beforedvdbudgets);
                        $magazinebudgets->prepend($beforemagazinebudgets);
                        $trainbudgets->prepend($beforetrainbudgets);
                        $travelbudgets->prepend($beforetravelbudgets);
                        $toybudgets->prepend($beforetoybudgets);
                        $othersbudgets->prepend($beforeothersbudgets);
                        
                        // 予算の一時変数の値を該当月の予算に更新
                        $budget = [
                            "stage" => $stagebudgets[$month_index],
                            "concert" => $concertbudgets[$month_index],
                            "web" => $webbudgets[$month_index],
                            "movie" => $moviebudgets[$month_index],
                            "cd" => $cdbudgets[$month_index],
                            "dvd" => $dvdbudgets[$month_index],
                            "magazine" => $magazinebudgets[$month_index],
                            "train" => $trainbudgets[$month_index],
                            "travel" => $travelbudgets[$month_index],
                            "toy" => $toybudgets[$month_index],
                            "others" => $othersbudgets[$month_index]
                        ];
                        
                        $month_index++;
                        
                    }
                    
                    $month_budgets[] = $budget;
                
                }
            
                
                
                for($i = 1; $i <= 12; $i++) {
            
                    if ($user_id != '' && $oshi_id != 'all' && $years != '') {
                        
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
                            
                    } elseif ($user_id != '' && $years != '') {
                        
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
                            
                    } elseif ($oshi_id != 'all') {
                    
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
                        
                    }  else {
                        
                        $stage_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', Auth::id() )->sum("stage");
                        $concert_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', Auth::id() )->sum("concert");
                        $web_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', Auth::id() )->sum("web");
                        $movie_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', Auth::id() )->sum("movie");
                        $cd_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', Auth::id() )->sum("cd");
                        $dvd_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', Auth::id() )->sum("dvd");
                        $magazine_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', Auth::id() )->sum("magazine");
                        $train_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', Auth::id() )->sum("train");
                        $travel_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', Auth::id() )->sum("travel");
                        $toy_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', Auth::id() )->sum("toy");
                        $others_sum["sum$i"] = Expense::whereYear('paid_at', $years)->whereMonth('paid_at', $i)->where('user_id', Auth::id() )->sum("others");
                            
                    }
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