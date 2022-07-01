<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memory_like extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function memory()
    {
        return $this->belongsTo(Memory::class);
    }//
}
