<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    //
    protected $guarded = array('id');
    
    public static $rules = array();
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
        
}
