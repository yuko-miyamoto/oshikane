<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Saving;
use App\Oshi;
use App\User;
use Auth;

class SavingController extends Controller
{
    //
    public function add()
    {
        $oshis = Oshi::where('user_id', Auth::id())->get();
        
        return view('admin.saving.create', ['oshis' => $oshis,]);
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Saving::$rules);
        $saving = new Saving;
        $form = $request->all();
        
        $oshis = Oshi::find($request->id);
        
        $saving->fill($form);
        $saving->save();
        
        return redirect('admin/saving/create');
    }
    
    public function index(Request $request) 
    {
        $login_user = User::find(Auth::id() );
        $dates = Saving::pluck('stocked_at');
        foreach ($dates as $date) {
            $array[] = $date->format('Y');
        }
        $years = collect($array)->unique()->sort()->reverse()->values();
        
        return view('admin.saving.index',['login_user' => $login_user, 'years' => $years]);
    }
}
