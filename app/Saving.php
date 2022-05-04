<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saving extends Model
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
    
    public static $rules = array(
        'stage' => 'numeric | min:0 | nullable',
        'stage_memo' => 'string | max:20 | nullable',
        'concert' => 'numeric | min:0 | nullable',
        'concert_memo' => 'string | max:20 | nullable',
        'web' => 'numeric | min:0 | nullable',
        'web_memo' => 'string | max:20 | nullable',
        'movie' => 'numeric | min:0 | nullable',
        'movie_memo' => 'string | max:20 | nullable',
        'cd' => 'numeric | min:0 | nullable',
        'cd_memo' => 'string | max:20 | nullable',
        'dvd' => 'numeric | min:0 | nullable',
        'dvd_memo' => 'string | max:20 | nullable',
        'magazine' => 'numeric | min:0 | nullable',
        'magazine_memo' => 'string | max:20 | nullable',
        'media' => 'numeric | min:0 | nullable',
        'media_memo' => 'string | max:20 | nullable',
        'others' => 'numeric | min:0 | nullable',
        'others_memo' => 'string | max:20 | nullable',
        
        );
        
        protected $dates = [
            'stocked_at',
        ];
    //
}
