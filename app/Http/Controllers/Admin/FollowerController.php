<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;
use App\Follower;



class FollowerController extends Controller
{
    
    public function store(Request $request)
    {
        $follower = new Follower;
        $follower->follower_id = Auth::user()->id; //フォローする人 = 認証ユーザー
        $follower->followee_id = $request->followee_id; //フォローされる人
        $follower->save();
        
        
        return redirect('admin/user/followlist');
    }
    
    public function delete(Request $request) 
    {
        $user = Auth::user()->id;
        $follower = Follower::where('followee_id', $request->id)->where('follower_id', $user)->first();
        $follower->delete();
        
        return redirect('admin/user/followlist');
    }    //
}
