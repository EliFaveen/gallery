<?php

namespace App\Http\Controllers\Artist;

use App\Follower;
use App\Hashtag;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        //index for showing everyones post
        //homenav
//        dd(\request()->all());
        $without_paginate=false;
        $posts=Post::orderBy('created_at','desc');
//        hashtag searxh
        if (\request()->filled('search-radio')) {
            if (\request('search-radio') == 1) {
//                dd($posts->user); //search in users //return users
//                $posts=$posts->user->where('username','LIKE',"%".\request('search')."%");
                //return index users
                $users = User::orderBy('created_at', 'desc')->where('role','artist')->where('username', 'LIKE', "%" . \request('search') . "%")->paginate(9);
                return view('artist.pages.home.index-users', compact('users'));
            }
            if (\request('search-radio') == 2) {
//                dd('title'); //search in posts return posts
                $posts = $posts->where('title', 'LIKE', "%" . \request('search') . "%");
            }
            if (\request('search-radio') == 3) {

                //روش 1
                $hashtags = Hashtag::all();
                foreach ($hashtags as $hashtag) {
                    $messy_tags = $hashtag->where('hashtag', 'LIKE', '%' . \request('search') . '%')->get();

                }
                foreach ($messy_tags as $messy_tag){
                   $posts_id[]= $messy_tag->post_id;
                }
                $posts_id=array_unique($posts_id);
//                foreach ($posts_id as $post_id){
                    $posts=Post::orderBy('created_at','desc')->find($posts_id);
//                    $posts=Post::orderBy('created_at','desc')->where($post_id);
//                }
//                return $posts;
                $without_paginate=true;

                return view('artist.pages.home.index',['posts'=>$posts, 'without_paginate'=>$without_paginate]);
            }
        }

//        return \request('categories');
        if (\request('categories')){
            $posts=$posts->whereHas('categories',function ($query){
                $query->where('category_id','LIKE',"%".\request('categories')."%");
            });
        }
//        return $posts;


        $posts=$posts->paginate(9);
        return view('artist.pages.home.index',['posts'=>$posts, 'without_paginate'=>$without_paginate]);
    }
    public function index_user($id){
        //index for showing a user post from a link
        $posts=Post::orderBy('created_at','desc')->where('user_id',$id)->paginate(9);
        $posts_user=User::find($id);
        return view('artist.pages.posts.index',['posts'=>$posts,'posts_user'=>$posts_user]);//change?
    }
    public function follow_unfollow(Request $request,$following_id,$follower_id){
//        dd($request->all());
        if ($request->input('followed')){
            User::find($follower_id)->followers()->attach([$following_id]);
//            User::find($follower_id);
//            Follower::create([
//
//            ])
        }
        if ($request->input('unfollowed')){
            User::find($follower_id)->followers()->detach([$following_id]);
        }

        return back();
    }

    public function showFollowings($id){
//        dd('followings');
//        $following_users=User::orderBy('created_at','desc')->where('username','LIKE',"%".\request('search')."%")->paginate(9);
//        return view('artist.pages.home.index-users',compact('users'));
//        $posts_user->followers->count()
        $users=User::find($id)->following;
//        $posts_user=\App\User::find($users->first()->pivot->follower_id); //== $user=User::find($id) //but error pivot
        $posts_user=\App\User::find($id);
        return view('artist.pages.home.follow-list',['users'=>$users,'posts_user'=>$posts_user]);
    }

    public function showFollowers($id){
//        dd('followers');
        $users=User::find($id)->followers; //followers

        $posts_user=\App\User::find($id); //== $user=User::find($id) //the page user
//        return $posts_user;
        return view('artist.pages.home.follow-list',['users'=>$users,'posts_user'=>$posts_user]);
    }

    public function index_popular(){

        $without_paginate=false;
//        $posts=Post::get();
//        foreach ($posts as $post){
//            $most_liked_posts[$post->id]=$post->likes->where('like',1)->count();
//        }

//        $posts = Post::withCount('likes',function ($query){
//            $query->where('like',1);
//        })->orderBy('likes_count','desc')->paginate(9);

        $posts = Post::withCount('likes')->orderBy('likes_count','desc')->orderBy('created_at','desc')->paginate(9);

//        foreach ($posts as $post) {
//            echo $post->likes_count ;
//        }


//        sort($most_liked_posts);
//        dd($posts);
//        return $posts;
        return view('artist.pages.home.index',['posts'=>$posts, 'without_paginate'=>$without_paginate]);
    }
}
