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
        $follower->follower_id = Auth::user()->id;
        $follower->followee_id = $request->follower_id;
        $follower->save();
        
        
        return redirect('admin/user/followlist');
    }
    
    public function delete(Request $request) 
    {
        $user = User::find($request->$id);
        
        $user->delete();
        
        
        return redirect('admin/user/followlist');
    }    //
}
