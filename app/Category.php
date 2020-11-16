<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

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
