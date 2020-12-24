<?php

namespace App\Http\Controllers\Artist;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Like;
use App\Post;
use Illuminate\Http\Request;

class NotifiyController extends Controller
{


    public function index(){
        $auth_user_id=auth()->user()->id;
        $posts_new_likes = [];
        $posts_new_comments = [];
        $posts=Post::where('user_id',$auth_user_id)->with('likes')->get();

        if ($posts->first()){
            foreach ($posts as $post) {
                $posts_new_likes[]=$post->likes->where('visited',0);
            }
        }
        $singleArray_likes = array();
        foreach ($posts_new_likes as $values){
            foreach ($values as $value)
            {
                $singleArray_likes[] = $value;
            }

        }

//        return $singleArray_likes;

        $posts=Post::where('user_id',$auth_user_id)->with('comments')->get();
        if ($posts->first()){
            foreach ($posts as $post) {
                $posts_new_comments[]=$post->comments->where('visited',0);
//            $comments_posts_id[]=$post->comments->where('visited',0)->first()->first()->comment;
            }
        }
        $singleArray_comments = array();
        foreach ($posts_new_comments as $values){
            foreach ($values as $value)
            {
                $singleArray_comments[] = $value;
            }

        }
//               return $singleArray_comments;


        return view('artist.pages.notifications.index',
            [
                'singleArray_likes'=>$singleArray_likes,
                'singleArray_comments' =>$singleArray_comments,

            ]);
    }
    public function like_visited($id){
        $like=Like::find($id);
        $like->update(['visited'=>1]);
        $post=$like->post;
        return redirect(route('artist.post.show',['post'=>$post]));
    }
    public function comment_visited($id){
        $comment=Comment::find($id);
        $comment->update(['visited'=>1]);
        $post=Post::find($comment->commentable_id);
        return redirect(route('artist.post.show',['post'=>$post]));
    }

}
