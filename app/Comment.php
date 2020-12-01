<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=['comment','approved','parent_id','commentable_id','commentable_type'];

    //------------------------------------------------------------//relation call like product->photos

//    //    relation one to many revers
//    public function post(){
//        return $this->belongsTo('App\Post');
//    }
//    //    relation one to many revers
    public function user(){
        return $this->belongsTo('App\User');
    }
//to return post within using $comment->commentable
    public function commentable(){
        return $this->morphTo();
    }
}
