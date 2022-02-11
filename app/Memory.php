<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memory extends Model
{
    //
    protected $guarded = array('id');
    
    public static $rules = array(
        'stage_name' => 'required',
        'artist' => 'required',
        'place' => 'required',
        'ticket' => 'required',
        'stage_memo' => 'required',
        );
}
