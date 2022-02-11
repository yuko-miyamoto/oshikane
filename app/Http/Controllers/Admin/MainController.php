<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Oshi;
use App\Memory;
use Auth;

class MainController extends Controller
{
    //
    public function add()
    {
        $posts = Oshi::where('user_id', Auth::id())
        ->where('tentacles', '=', 100)
        ->get();
        
        $posts2 = Memory::where('user_id', Auth::id())
        ->orderBy('created_at', 'desc')
        ->take(6)->get();
        
        return view('admin.main.index', ['posts' => $posts, 'posts2' => $posts2]);
    }
    
    

}