<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'lastname', 'username', 'phone', 'role', 'email', 'password',];

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

    //------------------------------------------------------------//relation call like product->photos

//    //    relation many to many ...
//    public function Categories(){
//        return $this->belongsToMany('App\Category')->using('App\Interest');
//    }
    //    relation one to many
    public function posts(){
        return $this->hasMany('App\Post');
    }
//    //    relation one to many
//    public function comments(){
//        return $this->hasMany('App\Comment');
//    }
    //    relation one to many
    public function likes(){
        return $this->hasMany('App\Like');
    }
}
