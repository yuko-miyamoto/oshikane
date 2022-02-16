<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use Auth;

class ProfileController extends Controller
{
    //
    public function add()
    {
        $posts = Profile::where('user_id', Auth::id() )
        ->get();
        
        return view('admin.profile.create', ['posts' => $posts]);
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Profile::$rules);
        
        $profile = new Profile;
        
        $form = $request->all();
        
        unset($form['_token']);
        
        $profile->fill($form);
        $profile->save();
        
        
        return redirect('admin/profile/create');
    }
    
    public function search(Request $request)
    {
       $cond_title = $request->cond_title;
       if ($cond_title != '') {
           $posts = Profile::where('profile_oshi', $cond_title)
           ->where('id', '!=', Auth::user()->id)
           ->get();
       } else {
           $posts = Profile::where('user_id', '!=', Auth::id())
           ->get();
           }
    
        return view('admin.profile.search', ['posts' => $posts, 'cond_title' => $cond_title]);
    }    
    
    public function followresult(Request $request)
    {
       $follower_id = $request->get('user_id');
       if ($follower_id != '') {
           $posts2 = Profile::where('user_id', '=', $follower_id)
           ->get();
        }
       
       return view('admin.profile.followresult', ['posts2' => $posts2]);
    }

    public function edit(Request $request)
    {
        $profile = Profile::find($request->id);
        
        return view('admin.profile.edit', ['profile_form' => $profile]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Profile::$rules);
        $profile = Profile::find($request->id);
        $profile_form = $request->all();
        
        unset($profile_form['_token']);
        
        $profile->fill($profile_form)->save();
        
        return redirect('admin/profile/create');
    }
}
