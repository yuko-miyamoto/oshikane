<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Oshi;
use App\Memory;
use App\User;
use App\Follower;
use App\Oshi_like;
use App\Memory_like;
use Carbon\carbon;
use Auth;

class MainController extends Controller
{
    //
    public function index(Request $request)
    {   //認証ユーザーがフォローしているユーザーid
        $followee = Follower::where('follower_id', Auth::id() )->pluck('followee_id')->toArray();     
        
        $oshis = Oshi::where('user_id', '!=', Auth::id() )->withCount('oshilikes')->orderBy('id', 'desc')->get();
        //$oshis = Oshi::where('user_id', '!=', Auth::id() )->get();
        
        $memories = Memory::where('user_id', '!=', Auth::id() )->orderBy('created_at', 'desc')->get();
        
        return view('admin.main.index', ['oshis' => $oshis, 'memories' => $memories, 'followee' => $followee]);
    }
    
    public function profile(request $request)
    {   //認証ユーザーがフォローしているユーザーid
        $followee = Follower::where('follower_id', Auth::id() )->pluck('followee_id')->toArray(); 
        $users = User::find($request->id);
        
        
        return view('admin.main.profile', ['users' => $users, 'followee' => $followee]);
    }

}