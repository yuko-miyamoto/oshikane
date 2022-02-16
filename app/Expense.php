<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Expense extends Model
{
    //
    public function oshi()
    {
        
        return $this->belongsTo('App\Oshi');
    } 
    
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
        'train' => 'numeric | nullable',
        'train_memo' => 'nullable',
        'travel' => 'numeric | nullable',
        'travel_memo' => 'nullable',
        'toy' => 'numeric | nullable',
        'toy_memo' => 'nullable',
        'others' => 'numeric | nullable',
        'others_memo' => 'nullable',
        'media' => 'numeric | nullable',
        'media_memo' => 'nullable',
        'date' => 'required',
        
        );
}
