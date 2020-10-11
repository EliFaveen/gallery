<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    protected $fillable=['post_id','hashtag',];

    //------------------------------------------------------------//relation call like product->photos

    //    relation one to many revers
    public function post(){
        return $this->belongsTo('App\Post');
    }
}
