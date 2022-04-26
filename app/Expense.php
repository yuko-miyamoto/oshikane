<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Expense extends Model
{
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function oshi()
    {
        return $this->belongsTo(Oshi::class);
    }
    
    public function budget()
    {
        return $this->belongsTo(Budget::class);
    }
    
    protected $guarded = array('id');
    
    public static $rules = array(
        'stage' => 'numeric | nullable',
        'stage_memo' => 'max:20 | nullable',
        'concert' => 'numeric | nullable',
        'concert_memo' => 'max:20 | nullable',
        'web' => 'numeric | nullable',
        'web_memo' => 'max:20 | nullable',
        'movie' => 'numeric | nullable',
        'movie_memo' => 'max:20 | nullable',
        'cd' => 'numeric | nullable',
        'cd_memo' => 'max:20 | nullable',
        'dvd' => 'numeric | nullable',
        'dvd_memo' => 'max:20 | nullable',
        'magazine' => 'numeric | nullable',
        'magazine_memo' => 'max:20 | nullable',
        'train' => 'numeric | nullable',
        'train_memo' => 'max:20 | nullable',
        'travel' => 'numeric | nullable',
        'travel_memo' => 'max:20 | nullable',
        'toy' => 'numeric | nullable',
        'toy_memo' => 'max:20 | nullable',
        'others' => 'numeric | nullable',
        'others_memo' => 'max:20 | nullable',
        'media' => 'numeric | nullable',
        'media_memo' => 'max:20 | nullable',
        );
        
        protected $dates = [
            'paid_at',
        ];
}
    
    
