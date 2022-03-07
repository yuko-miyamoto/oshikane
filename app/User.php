<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'nickname', 'oshi'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public static $rules = array (
        'nickname' => 'required',
        'oshi' => 'required',
    );
    
    public function oshis()
    {
        return $this->hasMany(Oshi::class);
    }
    
    public function memories()
    {
        return $this->hasMany(Memory::class);
    }
    
    public function followers() 
    {
        return $this->hasMany(Follower::class, 'followee_id');
        
    }
    
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
