<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memory extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //
    protected $guarded = array('id');
    
    public static $rules = array(
        'stage_name' => 'required | string | max:30',
        'artist' => 'required | string | max:30',
        'place' => 'required | string | max:30',
        'stage_memo' => 'required | string | max:255',
        'concert' => 'numeric | min:0 | max:100000',
        'stage' => 'numeric | min:0 | max:100000',
        's_list_01' => 'string | max:30',
        's_list_02' => 'string | max:30',
        's_list_03' => 'string | max:30',
        's_list_04' => 'string | max:30',
        's_list_05' => 'string | max:30',
        's_list_06' => 'string | max:30',
        's_list_07' => 'string | max:30',
        's_list_08' => 'string | max:30',
        's_list_09' => 'string | max:30',
        's_list_10' => 'string | max:30'
    );
}
