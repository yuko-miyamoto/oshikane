<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Oshi;
use App\Oshi_like;
use Auth;

class OshiLikeController extends Controller
{
    public function oshi_like(Request $request)
    {
        $like_flg = 0;
        $oshi_like = new Oshi_Like;
        $user_id = Auth::user()->id;
        $oshi_id = $request->oshi_id;
        $already_oshiliked = Oshi_like::where('user_id', $user_id)->where('oshi_id', $oshi_id)->first();
        
        if(!$already_oshiliked){
            $oshi_like->user_id = $user_id;
            $oshi_like->oshi_id = $oshi_id;
            $oshi_like->save();
            $like_flg = 1;
        } else {
            $already_oshiliked->delete();
        }
        $oshi_likes_count = Oshi_like::where('oshi_id', $oshi_id)->count();
        $oshilike_json = [$like_flg, $oshi_likes_count];
        
        return $oshilike_json;
    }
    //
}
