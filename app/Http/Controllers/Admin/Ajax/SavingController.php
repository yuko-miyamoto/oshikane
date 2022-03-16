<?php

namespace App\Http\Controllers\Admin\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Saving;
use Auth;

class SavingController extends Controller
{
     public function index(Request $request)
    {
        $oshi_id = $request->get('oshi_id');
        $years = $request->get('year');
        
        for($i = 1; $i <= 12; $i++) {
            
            $stage_sum["sum$i"] = Saving::whereYear('stocked_at', $years)->whereMonth('stocked_at', $i)->where('user_id', Auth::id() )->where('oshi_id', $oshi_id)->sum("stage");
            $concert_sum["sum$i"] = Saving::whereYear('stocked_at', $years)->whereMonth('stocked_at', $i)->where('user_id', Auth::id() )->where('oshi_id', $oshi_id)->sum("concert");
            $web_sum["sum$i"] = Saving::whereYear('stocked_at', $years)->whereMonth('stocked_at', $i)->where('user_id', Auth::id() )->where('oshi_id', $oshi_id)->sum("web");
            $movie_sum["sum$i"] = Saving::whereYear('stocked_at', $years)->whereMonth('stocked_at', $i)->where('user_id', Auth::id() )->where('oshi_id', $oshi_id)->sum("movie");
            $cd_sum["sum$i"] = Saving::whereYear('stocked_at', $years)->whereMonth('stocked_at', $i)->where('user_id', Auth::id() )->where('oshi_id', $oshi_id)->sum("cd");
            $dvd_sum["sum$i"] = Saving::whereYear('stocked_at', $years)->whereMonth('stocked_at', $i)->where('user_id', Auth::id() )->where('oshi_id', $oshi_id)->sum("dvd");
            $magazine_sum["sum$i"] = Saving::whereYear('stocked_at', $years)->whereMonth('stocked_at', $i)->where('user_id', Auth::id() )->where('oshi_id', $oshi_id)->sum("magazine");
            $media_sum["sum$i"] = Saving::whereYear('stocked_at', $years)->whereMonth('stocked_at', $i)->where('user_id', Auth::id() )->where('oshi_id', $oshi_id)->sum("media");
            $others_sum["sum$i"] = Saving::whereYear('stocked_at', $years)->whereMonth('stocked_at', $i)->where('user_id', Auth::id() )->where('oshi_id', $oshi_id)->sum("others");
            
            $saving_array = [
                "stage" => $stage_sum,
                "concert" => $concert_sum,
                "web" => $web_sum,
                "movie" => $movie_sum,
                "cd" => $cd_sum,
                "dvd" => $dvd_sum,
                "magazine" => $magazine_sum,
                "media" => $media_sum,
                "others" => $others_sum
            ];
        }
        
        return response()->json($saving_array);
    }
    //
}
