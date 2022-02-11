<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Saving;
use App\Oshi;
use Auth;

class SavingController extends Controller
{
    //
    public function add()
    {
        $posts = Oshi::where('user_id', Auth::id())->get();
        
        return view('admin.saving.create', ['posts' => $posts,]);
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Saving::$rules);
        $saving = new Saving;
        $form = $request->all();
        
        $posts = Oshi::find($request->id);
        
        $saving->fill($form);
        $saving->save();
        
        return redirect('admin/saving/create');
    }
}
