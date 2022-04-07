<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Oshi;
use App\Memory;
use App\User;
use App\Follower;
use Carbon\carbon;
use Auth;

class MainController extends Controller
{
    //
    public function index(Request $request)
    {
        $now = Carbon::now();
        $historydays = Oshi::pluck('history')->toArray();
        $days = $now->diff($historydays[0]);
        
        $followee = Follower::where('follower_id', Auth::id() )->pluck('followee_id')->toArray(); //認証ユーザーがフォローしているユーザーid    
        
        $oshis = Oshi::where('user_id', '!=', Auth::id() )
        ->where('tentacles', '>', 50)->get();
        
        $memories = Memory::where('user_id', '!=', Auth::id() )
        ->orderBy('created_at', 'desc')
        ->take(6)->get();
        
        return view('admin.main.index', ['oshis' => $oshis, 'memories' => $memories, 'followee' => $followee]);
    }
    
    public function profile(request $request)
    {
        $followee = Follower::where('follower_id', Auth::id() )->pluck('followee_id')->toArray(); //認証ユーザーがフォローしているユーザーid
        $users = User::find($request->id);
        
        
        return view('admin.main.profile', ['users' => $users, 'followee' => $followee]);
    }

}