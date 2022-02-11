<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saving extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'stage' => 'numeric | nullable',
        'stage_memo' => 'nullable',
        'concert' => 'numeric | nullable',
        'concert_memo' => 'nullable',
        'web' => 'numeric | nullable',
        'web_memo' => 'nullable',
        'movie' => 'numeric | nullable',
        'movie_memo' => 'nullable',
        'cd' => 'numeric | nullable',
        'cd_memo' => 'nullable',
        'dvd' => 'numeric | nullable',
        'dvd_memo' => 'nullable',
        'magazine' => 'numeric | nullable',
        'magazine_memo' => 'nullable',
        'media' => 'numeric | nullable',
        'media_memo' => 'nullable',
        'others' => 'numeric | nullable',
        'others_memo' => 'nullable',
        'date' => 'required',
        );
    //
}
