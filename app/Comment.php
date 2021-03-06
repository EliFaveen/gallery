<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=['comment','approved','parent_id','commentable_id','commentable_type','visited'];

    //------------------------------------------------------------//relation call like product->photos

//    //    relation one to many revers
    public function post(){
        return $this->belongsTo('App\Post')->withTrashed();
    }
//    //    relation one to many revers
    public function user(){
        return $this->belongsTo('App\User')->withTrashed();
    }
//to return post within using $comment->commentable
    public function commentable(){
        return $this->morphTo();
    }
//    a relation between parent comments and it's replies(childs)
    public function child(){
        return $this->hasMany('App\Comment','parent_id','id');
    }
    public function parent(){
        return $this->hasOne('App\Comment','id','parent_id');
    }
}
