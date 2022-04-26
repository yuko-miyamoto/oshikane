<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Follower;
use Auth;


class UserController extends Controller
{
    public function add()
    {
        //認証ユーザーのid取得
        $user = User::find(Auth::id() );
        
        return view('admin.user.profile', ['user' => $user]);
    }
    
    public function search(Request $request)
    {   //認証ユーザーがフォローしているユーザーid
        $followee = Follower::where('follower_id', Auth::id() )->pluck('followee_id')->toArray(); 
        
        $cond_title = $request->cond_title;
        
        if ($cond_title != '') {
            //リクエストを認証ユーザー以外から取得
            $users = User::where('oshi', 'like', '%' .$cond_title .'%')->where('id', '!=', Auth::user()->id)->get();
        } else {
            //該当がない場合は認証ユーザー以外のすべてのユーザーを取得
            $users = User::where('id', '!=', Auth::user()->id)->get(); 
        }
        return view('admin.user.search', [
            'users' => $users,
            'cond_title' => $cond_title,
            'followee' => $followee,
        ]);
    }
    
    public function edit(Request $request)
    {
        $user = User::find($request->id);
        
        if(empty($user)) {
            abort(404);
        }
        
        return view('admin.user.edit', ['user_form' => $user]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, User::$rules);
        
        $user = User::find($request->id);
        
        $user_form = $request->all();
        
        if($request->remove == 'true') {
            $user_form['profile_image_path'] = null;
        } elseif($request->file('profile_image')) {
            $path = $request->file('profile_image')->store('public/image');
            $user_form['profile_image_path'] = basename($path);
        } else {
            $user_form['profile_image_path'] = $user->profile_image_path;
        }
        
        unset($user_form['profile_image']);
        unset($user_form['remove']);
        unset($user_form['_token']);
        
        $user->fill($user_form)->save();
        
        return redirect('admin/user/profile');
    }
    
    public function index(Request $request)
    {
        $followers = Follower::where('follower_id', Auth::id() )->get();
        
        return view('admin.user.followlist',['followers' => $followers]);
    }
}

