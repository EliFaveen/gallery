<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable=['img_url', 'post_id',];
    //------------------------------------------------------------//relation call like product->photos

    //    relation one to many revers
    public function post(){
        return $this->belongsTo('App\Post');
    }
}
