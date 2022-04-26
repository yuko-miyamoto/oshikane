<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    //
    protected $guarded = array('id');
    
    public static $rules = array(
        'total_budget' => 'required | numeric',
        'stage' => 'numeric | nullable',
        'concert' => 'numeric | nullable',
        'web' => 'numeric | nullable',
        'movie' => 'numeric | nullable',
        'cd' => 'numeric | nullable',
        'dvd' => 'numeric | nullable',
        'magazine' => 'numeric | nullable',
        'train' => 'numeric | nullable',
        'travel' => 'numeric | nullable',
        'toy' => 'numeric | nullable',
        'others' => 'numeric | nullable',
        'media' => 'numeric | nullable',
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
