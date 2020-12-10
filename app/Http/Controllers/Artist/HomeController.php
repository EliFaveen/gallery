<?php

namespace App\Http\Controllers\Artist;

use App\Follower;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        //index for showing everyones post
        //homenav
        $posts=Post::orderBy('created_at','desc')->paginate(9);
        return view('artist.pages.home.index',compact('posts'));
    }
    public function index_user($id){
        //index for showing a user post from a link
        $posts=Post::orderBy('created_at','desc')->where('user_id',$id)->paginate(9);
        $posts_user=User::find($id);
        return view('artist.pages.posts.index',['posts'=>$posts,'posts_user'=>$posts_user]);//change?
    }
    public function follow_unfollow(Request $request,$follower_id,$following_id){
//        dd($request->all());
        if ($request->input('followed')){
            User::find($follower_id)->followers()->sync([$following_id]);
//            User::find($follower_id);
//            Follower::create([
//
//            ])
        }
        if ($request->input('unfollowed')){
            User::find($follower_id)->followers()->detach([$following_id]);
        }
    }
}
