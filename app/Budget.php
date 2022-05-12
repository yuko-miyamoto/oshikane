<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    //
    protected $guarded = array('id');
    
    public static $rules = array(
        'total_budget' => 'required | min:0 | numeric',
        'stage' => 'numeric | min:0 | nullable',
        'concert' => 'numeric | min:0 | nullable',
        'web' => 'numeric | min:0 | nullable',
        'movie' => 'numeric | min:0 | nullable',
        'cd' => 'numeric | min:0 | nullable',
        'dvd' => 'numeric | min:0 | nullable',
        'magazine' => 'numeric | min:0 | nullable',
        'train' => 'numeric | min:0 | nullable',
        'travel' => 'numeric | min:0 | nullable',
        'toy' => 'numeric | min:0 | nullable',
        'others' => 'numeric | min:0 | nullable',
        'media' => 'numeric | min:0 | nullable',
        'register_year' => 'required',
        'register_month' => 'required'
    );
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
    
}
