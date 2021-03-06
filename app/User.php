<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'lastname', 'username', 'phone', 'role', 'email', 'password','country','bio','profile_pic','birthdate'];

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

    //---------------------------------------------------------------------// methods

    public function setPasswordAttribute($value){
        //dd($value);
        $this->attributes['password']= bcrypt($value);
    }

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
    public function comments(){ ///////////i dont know if its nessecery
        return $this->hasMany('App\Comment');
    }
    //    relation one to many
    public function likes(){
        return $this->hasMany('App\Like');
    }

    // users that are followed by this user
    public function following() {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'following_id');
    }

// users that follow this user
    public function followers() {
        return $this->belongsToMany(User::class, 'followers', 'following_id', 'follower_id');
    }
}
