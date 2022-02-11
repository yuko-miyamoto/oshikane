<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $guarded = array('id');
    
    public static $rules = array(
        'profile_name' => 'required',
        'profile_oshi' => 'required',
        
        );
}
