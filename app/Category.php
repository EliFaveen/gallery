<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable =['title','description','category_pic'];

    //------------------------------------------------------------//relation call like product->photos

//    //    relation many to many ...
//    public function posts(){
//        return $this->belongsToMany('App\Post')->using('App\CategoryPost');
//    }
//    //    relation many to many ...
//    public function users(){
//        return $this->belongsToMany('App\User')->using('App\Interest');
//    }
}
