<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Expense;
use App\Budget;
use App\Category;
use App\Oshi;
use App\User;
use Carbon\carbon;
use Auth;

class BalancepaymentController extends Controller
{
    //
    public function chartindex(Request $request)
    {
        $user_id = $request->get('user_id');
        
        if ($user_id != '') {
            
            $oshis = User::find($user_id);
            
        } else {
            
            $oshis = user::find(Auth::id() );
        }
        
        $dates = Expense::pluck('paid_at');
        
        foreach ($dates as $date) {
            
            $array[] = $date->format('Y');
        }
        
        $years = collect($array)->unique()->sort()->reverse()->values();
        
        
        return view('admin.balancepayment.index', ['oshis' => $oshis, 'years' => $years, 'user_id' => $user_id]);
    }
}
