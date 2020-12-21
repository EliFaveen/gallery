<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Like;
use App\Post;
use Illuminate\Http\Request;

class NotifiyController extends Controller
{
    public function index(){
        $auth_user_id=auth()->user()->id;
        $posts=Post::where('user_id',$auth_user_id)->with('likes')->get();
        foreach ($posts as $post) {
            $posts_new_likes[]=$post->likes->where('visited',0);
        }
        $posts=Post::where('user_id',$auth_user_id)->with('comments')->get();
        foreach ($posts as $post) {
            $posts_new_comments[]=$post->comments->where('visited',0);
        }
        return $posts_new_comments;
        return view('artist.pages.notifications.index',['posts_new_likes'=>$posts_new_likes]);
    }
    public function like_visited($id){
        $like=Like::find($id);
        $like->update(['visited'=>1]);
        $post=$like->post;
        return redirect(route('artist.post.show',['post'=>$post]));
    }

}
