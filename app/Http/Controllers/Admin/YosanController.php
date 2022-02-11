<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Yosan;
use Auth;

class YosanController extends Controller
{
    //
    public function add()
    {
        return view('admin.yosan.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Yosan::$rules);
        $yosan = new Yosan;
        $form = $request->all();
       
        $yosan->fill($form);
        $yosan->save();
        
        return redirect('admin/yosan/create');
    }
}
