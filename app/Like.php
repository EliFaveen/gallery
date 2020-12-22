<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public $fillable = ['visited'];

    //------------------------------------------------------------//relation call like product->photos

    //    relation one to many revers
    public function post(){
        return $this->belongsTo('App\Post')->withTrashed();
    }
    //    relation one to many revers
    public function user(){
        return $this->belongsTo('App\User')->withTrashed();
    }

}
