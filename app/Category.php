<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function getLists()
    {
        $categories = Category::pluck('category_name', 'id');
        
        return $categories;
    }
    
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
    
    public function oshis()
    {
        return $thi->hasMany(Oshi::class);
    }
    
    public function users()
    {
        return $this->hasMany(User::class);
    }
    //
}
