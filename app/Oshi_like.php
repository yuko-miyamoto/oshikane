<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oshi_like extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function oshi()
    {
        return $this->belongsTo(Oshi::class);
    }
    protected $guarded = array('id');
    //
}
