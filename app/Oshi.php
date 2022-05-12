<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Oshi extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
    
    public function savings()
    {
        return $this->hasMany(Saving::class);
    }
    //
    protected $guarded = array('id');
    
    public static $rules = array(
        'oshi_name' => 'required | string | max:30',
        'birthday_y' => 'required',
        'birthday_m' => 'required',
        'birthday_d' => 'required',
        'blood' => 'required',
        'oshi_height' => 'required | numeric | min:3',
        'oshi_weight' => 'required | numeric | min:2',
        'oshi_group' => 'string | max:30 |nullable',
        'history_y' => 'required',
        'history_m' => 'required',
        'history_d' => 'required',
        'tentacles' => 'required',
        'oshi_memo' => 'required | string | max:255',
        
        );
    
    }