<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Oshi extends Model
{
    public function expenses ()
    {
        return $this->hasMany('App/Expense');
    }
    //
    protected $guarded = array('id');
    
    public static $rules = array(
        'oshi_name' => 'required',
        'birthday' => 'date',
        'birthday_y' => 'required',
        'birthday_m' => 'required',
        'birthday_d' => 'required',
        'blood' => 'required',
        'oshi_height' => 'required | numeric',
        'oshi_weight' => 'required | numeric',
        'oshi_group' => 'required',
        'history_y' => 'required',
        'history_m' => 'required',
        'history_d' => 'required',
        'tentacles' => 'required',
        'oshi_memo' => 'required',
        
        );
    
    }