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
        'stage_name' => 'required',
        'artist' => 'required',
        'place' => 'required',
        'stage_memo' => 'required',
        );
}
