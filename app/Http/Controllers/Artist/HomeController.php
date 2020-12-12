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
//        dd(\request()->all());

        $posts=Post::orderBy('created_at','desc');
//        hashtag searxh
        if (\request()->filled('search-radio')){
            if (\request('search-radio') == 1){
//                dd($posts->user); //search in users //return users
//                $posts=$posts->user->where('username','LIKE',"%".\request('search')."%");
                //return index users
                $users=User::orderBy('created_at','desc')->where('username','LIKE',"%".\request('search')."%")->paginate(9);
                return view('artist.pages.home.index-users',compact('users'));
            }
            if (\request('search-radio') == 2){
//                dd('title'); //search in posts return posts
                $posts=$posts->where('title','LIKE',"%".\request('search')."%");
            }
            if (\request('search-radio') == 3){
//                dd('hashtag'); //search in hashtags return posts
//                $posts=$posts->with('hashtags')
//                    ->when(\request('hashtags') > 0,function ($query){$query->where('hashtags',\request('hashtags'));})->get();
//                return $posts->first()->hashtags;



//                return posts;

                foreach ($posts->first()->hashtags as $hashtag){
                     $messy_tags= $hashtag->where('hashtag','LIKE',"%".\request('search')."%")->get();
                     return $messy_tags;
//                     foreach ($messy_tags as $single_tag){
//                         return $single_tag;
//                     }

                }
//                با یک کالکشنی مثل این مقایسه کنیمب

//                foreach ($posts as $post){
////                    $taged[]=$post->hashtags->where('hashtag','LIKE',"%".\request('search')."%")->get()->id;
//                    foreach ($post->hashtags as $hashtag){
//                        return $hashtag->where('hashtag','LIKE',"%".\request('search')."%")->get();
//
//                    }
//                }
//                $posts=$posts->where('title','LIKE',"%".\request('search')."%");
            }
        }
        $posts=$posts->paginate(9);
        return view('artist.pages.home.index',compact('posts'));
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
        $posts_user=\App\User::find($users->first()->pivot->follower_id); //== $user=User::find($id)
        return view('artist.pages.home.follow-list',['users'=>$users,'posts_user'=>$posts_user]);
    }

    public function showFollowers($id){
//        dd('followers');
        $users=User::find($id)->followers;
        $posts_user=\App\User::find($id); //== $user=User::find($id)
        return view('artist.pages.home.follow-list',['users'=>$users,'posts_user'=>$posts_user]);
    }
}
