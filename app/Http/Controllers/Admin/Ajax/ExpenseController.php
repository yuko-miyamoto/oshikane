<?php

namespace App\Http\Controllers\Admin\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Expense;
use App\Budget;
use Auth;

class ExpenseController extends Controller
{
     public function index(Request $request)
    {
        $oshi_id = $request->get('oshi_id');
        $years = $request->get('year');
        
        $month = Budget::where('register_year', 2021)->pluck('register_month');
        $result1 = $month[1] - $month[0];
        $result2 = $month[2] - $month[1];
        
        for ($i=1; $i <= $result1; $i++) {
       
        $stagebudget[] = Budget::where('register_year', 2021)->where('register_month', $month[0])->where('user_id', Auth::id() )->sum("stage");
        $concertbudget[] = Budget::where('register_year', 2021)->where('register_month', $month[0])->where('user_id', Auth::id() )->sum("concert");
        $webbudget[] = Budget::where('register_year', 2021)->where('register_month', $month[0])->where('user_id', Auth::id() )->sum("web");
        $moviebudget[] = Budget::where('register_year', 2021)->where('register_month', $month[0])->where('user_id', Auth::id() )->sum("movie");
        $cdbudget[] = Budget::where('register_year', 2021)->where('register_month', $month[0])->where('user_id', Auth::id() )->sum("cd");
        $dvdbudget[] = Budget::where('register_year', 2021)->where('register_month', $month[0])->where('user_id', Auth::id() )->sum("dvd");
        $magazinebudget[] = Budget::where('register_year', 2021)->where('register_month', $month[0])->where('user_id', Auth::id() )->sum("magazine");
        $trainbudget[] = Budget::where('register_year', 2021)->where('register_month', $month[0])->where('user_id', Auth::id() )->sum("train");
        $travelbudget[] = Budget::where('register_year', 2021)->where('register_month', $month[0])->where('user_id', Auth::id() )->sum("travel");
        $toybudget[] = Budget::where('register_year', 2021)->where('register_month', $month[0])->where('user_id', Auth::id() )->sum("toy");
        $othersbudget[] = Budget::where('register_year', 2021)->where('register_month', $month[0])->where('user_id', Auth::id() )->sum("others");
        
        }
        for ($i=1; $i <= $result2; $i++) {
       
        $stagebudget[] = Budget::where('register_year', 2021)->where('register_month', $month[1])->where('user_id', Auth::id() )->sum("stage");
        $concertbudget[] = Budget::where('register_year', 2021)->where('register_month', $month[1])->where('user_id', Auth::id() )->sum("concert");
        $webbudget[] = Budget::where('register_year', 2021)->where('register_month', $month[1])->where('user_id', Auth::id() )->sum("web");
        $moviebudget[] = Budget::where('register_year', 2021)->where('register_month', $month[1])->where('user_id', Auth::id() )->sum("movie");
        $cdbudget[] = Budget::where('register_year', 2021)->where('register_month', $month[1])->where('user_id', Auth::id() )->sum("cd");
        $dvdbudget[] = Budget::where('register_year', 2021)->where('register_month', $month[1])->where('user_id', Auth::id() )->sum("dvd");
        $magazinebudget[] = Budget::where('register_year', 2021)->where('register_month', $month[1])->where('user_id', Auth::id() )->sum("magazine");
        $trainbudget[] = Budget::where('register_year', 2021)->where('register_month', $month[1])->where('user_id', Auth::id() )->sum("train");
        $travelbudget[] = Budget::where('register_year', 2021)->where('register_month', $month[1])->where('user_id', Auth::id() )->sum("travel");
        $toybudget[] = Budget::where('register_year', 2021)->where('register_month', $month[1])->where('user_id', Auth::id() )->sum("toy");
        $othersbudget[] = Budget::where('register_year', 2021)->where('register_month', $month[1])->where('user_id', Auth::id() )->sum("others");
        
        }
        
        $stagebudget[] = Budget::where('register_year', 2021)->where('register_month', $month[2])->where('user_id', Auth::id() )->sum("stage");
        $concertbudget[] = Budget::where('register_year', 2021)->where('register_month', $month[2])->where('user_id', Auth::id() )->sum("concert");
        $webbudget[] = Budget::where('register_year', 2021)->where('register_month', $month[2])->where('user_id', Auth::id() )->sum("web");
        $moviebudget[] = Budget::where('register_year', 2021)->where('register_month', $month[2])->where('user_id', Auth::id() )->sum("movie");
        $cdbudget[] = Budget::where('register_year', 2021)->where('register_month', $month[2])->where('user_id', Auth::id() )->sum("cd");
        $dvdbudget[] = Budget::where('register_year', 2021)->where('register_month', $month[2])->where('user_id', Auth::id() )->sum("dvd");
        $magazinebudget[] = Budget::where('register_year', 2021)->where('register_month', $month[2])->where('user_id', Auth::id() )->sum("magazine");
        $trainbudget[] = Budget::where('register_year', 2021)->where('register_month', $month[2])->where('user_id', Auth::id() )->sum("train");
        $travelbudget[] = Budget::where('register_year', 2021)->where('register_month', $month[2])->where('user_id', Auth::id() )->sum("travel");
        $toybudget[] = Budget::where('register_year', 2021)->where('register_month', $month[2])->where('user_id', Auth::id() )->sum("toy");
        $othersbudget[] = Budget::where('register_year', 2021)->where('register_month', $month[2])->where('user_id', Auth::id() )->sum("others");
        
        $budgets = [
            "stage" => array_sum($stagebudget),
            "concert" => array_sum($concertbudget),
            "web" => array_sum($webbudget),
            "movie" => array_sum($moviebudget),
            "cd" => array_sum($cdbudget),
            "dvd" => array_sum($dvdbudget),
            "magazine" => array_sum($magazinebudget),
            "train" => array_sum($trainbudget),
            "travel" => array_sum($travelbudget),
            "toy" => array_sum($toybudget),
            "others" => array_sum($othersbudget)
        ];
        dd($budgets);
        
        
        for($i = 1; $i <= 12; $i++) {
            
            if ($oshi_id != 'all') {
            
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
            
            } else {
                
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