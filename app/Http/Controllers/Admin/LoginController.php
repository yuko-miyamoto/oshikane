<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //
    public function add()
    {
        return view('admin.main.create');
    }
    
     public function create()
    {
        return redirect('admin/main/create');
    }

}