<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $posts=Post::orderBy('created_at','desc')->paginate(9);
        return view('artist.pages.home.index',compact('posts'));
    }
}
