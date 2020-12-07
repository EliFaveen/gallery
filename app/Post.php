<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable=['title', 'description','user_id'];
    //------------------------------------------------------------//relation call like product->photos

    //    relation one to many
    public function photos(){
        return $this->hasMany('App\Photo');
    }
//    //    relation one to many
//    public function comments(){
//        return $this->hasMany('App\Comment');
//    }

//instead of above we use polymorphic for comments //copy paste this code for other commentable models
    public function comments(){
        return $this->morphMany('App\Comment','commentable');
    }
    //    relation one to many
    public function likes(){
//        i thought it's hasMany
        return $this->hasMany('App\Like');
    }
//    //    relation one to many
    public function hashtags(){
        return $this->hasMany('App\Hashtag');
    }
//    //    relation many to many ...
    public function categories(){
        return $this->belongsToMany(Category::class ,'category_posts');
    }
    //    relation one to many revers
    public function user(){
        return $this->belongsTo('App\User');
    }
}
