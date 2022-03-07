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
        $users = User::where('id', Auth::id() )->get();
        
        return view('admin.user.profile', ['users' => $users]);
    }
    
    public function profile_create(Request $request)
    {
        $this->validate($request, User::$rules);
        
        $user = User::find(Auth::id() ); //登録するidを取得
        
        $form = $request->all();
        
        unset($form['_token']);
        
        $user->fill($form);
        $user->save();
        
        return redirect('admin/user/profile');
    }
    
    public function search(Request $request)
    {
        $followee = Follower::where('follower_id', Auth::id() )->pluck('followee_id')->toArray(); //認証ユーザーがフォローしているユーザーid
        
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            $users = User::where('oshi', 'like', '%' .$cond_title .'%')
            ->where('id', '!=', Auth::user()->id)  //リクエストを認証ユーザー以外から取得
            ->where('nickname', '!=', null)        //nicknameがnull以外のもの
            ->get();
            } else {
                $users = User::where('id', '!=', Auth::user()->id)
                ->where('nickname', '!=', null)
                ->get(); //該当がない場合は認証ユーザー以外のすべてのユーザーを取得
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
        
        return view('admin.user.edit', ['user_form' => $user]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, User::$rules);
        $user = User::find($request->id);
        $user_form = $request->all();
        
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

