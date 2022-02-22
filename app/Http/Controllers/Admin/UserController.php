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
        $users = User::all();
        return view('admin.user.create', ['users' => $users]);
    }
    
    public function create(Request $request)
    {
        $this->validate($request, User::$rules);
        
        $user = new User;
        
        $form = $request->all();
        
        unset($form['_token']);
        
        $user->fill($form);
        $user->save();
        
        return redirect('admin/user/create');
    }
    
    public function search(Request $request)
    {
       //リクエストを認証ユーザー以外から取得
        $cond_title = $request->cond_title;
       if ($cond_title != '') {
           $user = User::where('oshi', 'like', '%' .$cond_title .'%')->where('id', '!=', Auth::user()->id)->get();
           //該当がない場合は認証ユーザー以外のすべてのユーザーを取得
           } else {
               $user = User::where('id', '!=', Auth::user()->id)->get();
            }
        return view('admin.user.search', ['users' => $users, 'cond_title' => $cond_title]);
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
        
        return redirect('admin/user/create');
    }
    
    public function followers(Request $request)
    {
        $followers = Auth::user()->followers;
        
        return view('admin.user.followlist',['followers' => $followers]);
    }
}

