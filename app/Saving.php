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
        'stage' => 'numeric | nullable',
        'stage_memo' => 'string | max:20 | nullable',
        'concert' => 'numeric | nullable',
        'concert_memo' => 'string | max:20 | nullable',
        'web' => 'numeric | nullable',
        'web_memo' => 'string | max:20 | nullable',
        'movie' => 'numeric | nullable',
        'movie_memo' => 'string | max:20 | nullable',
        'cd' => 'numeric | nullable',
        'cd_memo' => 'string | max:20 | nullable',
        'dvd' => 'numeric | nullable',
        'dvd_memo' => 'string | max:20 | nullable',
        'magazine' => 'numeric | nullable',
        'magazine_memo' => 'string | max:20 | nullable',
        'media' => 'numeric | nullable',
        'media_memo' => 'string | max:20 | nullable',
        'others' => 'numeric | nullable',
        'others_memo' => 'string | max:20 | nullable',
        
        );
        
        protected $dates = [
            'stocked_at',
        ];
    //
}
