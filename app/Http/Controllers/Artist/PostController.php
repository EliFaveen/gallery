<?php

namespace App\Http\Controllers\Artist;

use App\CategoryPost;
use App\Comment;
use App\Hashtag;
use App\Http\Controllers\Controller;
use App\Photo;
use App\Post;
use App\Like; //i added this
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $first_user=\auth()->user();
//
//        $second_user=\App\User::find(20);
////        return \auth()->user()->following;//->kasaii ke man daram unaro follow mikonam// 19 20
//        $first_user->with('following')
//            ->when(\request('follower_id') > 0,function ($query){$query->where('follower_id',\request('follower_id'));})
//            ->get();
////        return $first_user->following;
//        foreach ($first_user->following as $following){
//            if ($following->id == $second_user->id){
//                return true;
//            }
//        }


        $posts=Post::orderBy('created_at','desc')->where('user_id',\auth()->user()->id)->paginate(9);
        $posts_user=\auth()->user();
//        $followings=\auth()->user()->with('following')
//        ->when(\request('follower_id') > 0,function ($query){$query->where('follower_id',\request('follower_id'));})
//        ->get();

        return view('artist.pages.posts.index',['posts'=>$posts,'posts_user'=>$posts_user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('artist.pages.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $fixed_path=Session::get('fixed_path');
//        dd($fixed_path);
        $post=Post::create([
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
//            'user_id'=>1,//todo: take it from auth()
            'user_id'=>\auth()->user()->id,

        ]);


//        simple multiple photo upload
//        if ($request->file('photos')){
//            foreach ($request->file('photos') as $photo)
//            {
//                $path=$photo->store('postphotos');
//                $fixed_path='storage/'.$path;
//                Photo::create([
//                    'img_url'=>$fixed_path,
//                    'post_id'=>$post->id,
//                ]);
//            }
//        }




//        //todo:add photo to category
        if ($request->has('categories')){
            foreach ($request->input('categories') as $category)
            {
                CategoryPost::create([
                    'post_id'=>$post->id,
                    'category_id'=>$category,
                ]);
            }
        }
        if ($request->has('hashtags')){
            foreach ($request->input('hashtags') as $hashtag)
            {
                Hashtag::create([
                    'post_id'=>$post->id,
                    'hashtag'=>$hashtag,
                ]);
            }

        }
        return redirect(route('image_cropper',['post_id'=>$post->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        //return get_class($post);

//                return \auth()->user()->comments()->create([
//                    'comment'=>'this is my comment',
//                    'commentable_id'=>$post->id,
//                    'commentable_type'=>get_class($post),
//                ]);

//            return $post->comments()->get();
//        $comment=Comment::find(1);
//        return $comment->commentable;//it returns post by using comment
//        return $post->comments()->where('parent_id',0)->get();

        return view('artist.pages.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $post=Post::find($id);
//        return view('artist.pages.posts.edit',compact('post'));
        //dont have a view
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=Post::find($id);
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

        $post->title=$request->input('title');
        $post->description=$request->input('description');

        $post->update();
        return redirect(route('artist.post.show',compact('post')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect(route('artist.post.index'));
    }
    public function postLikePost(Request $request){
        $post_id = $request['postId'];
        //what we getting here is a string not a boolean so we use === but how it's an if
        $is_like = $request['isLike'] === 'true';

        // 4 cases is possible for like and dislike

        $update=false;
        $post=Post::find($post_id);

        if (!$post){
            //if i didnt find the post noting happends
            return null;

//            $like_count=\App\Like::where('post_id',$post_id)->where('like',1)->count();
//            $dislike_count=\App\Like::where('post_id',$post_id)->where('like',0)->count();
//            return response()->json([
//                'like_count' => $like_count,
////                'dislike_count' =>$dislike_count
//            ]);

        }

        $user= Auth::user();
        //get all the likes this user had
        $like=$user->likes()->where('post_id',$post_id)->first(); //can we use relations like this?

        if ($like){
            //already liked this post
            $already_like=$like->like;//accessing the value
            $update=true;

            if ($already_like == $is_like){
                //undo the liking
                $like->delete();
//                $like_count=\App\Like::where('post_id',$post_id)->where('like',1)->count();
//                $dislike_count=\App\Like::where('post_id',$post_id)->where('like',0)->count();
//                return response()->json([
//                    'like_count' => $like_count,
////                    'dislike_count' =>$dislike_count
//                ]);
                return null;
            }
        }else{
            $like = new like();
        }
        // this part is for two case (if we didnt have this record or if we had and we want to change it
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        if ($update){
            $like->update();
//            $like_count=\App\Like::where('post_id',$post_id)->where('like',1)->count();
//            $dislike_count=\App\Like::where('post_id',$post_id)->where('like',0)->count();

        }else{
            $like->save();
//            $like_count=\App\Like::where('post_id',$post_id)->where('like',1)->count();
//            $dislike_count=\App\Like::where('post_id',$post_id)->where('like',0)->count();

        }
//        return response()->json([
////            'like_count' => $like_count,
////            'dislike_count' =>$dislike_count
//        ]);
        return null; //it's better to show a message but it's ok like this


    }
    public function updateHashtag(Request $request,$id){
//        dd('hi');
//return $request->all();
        $post=Post::find($id);
//        if ($request->has('categories')){

        $post_hashtags=Hashtag::where('post_id',$id)->get();
        foreach ($post_hashtags as $post_hashtag){
            $post_hashtag->delete();
        }
//                return $post_categories;
        foreach ($request->input('hashtags') as $hashtag)
        {
            Hashtag::create([
                'post_id'=>$post->id,
                'hashtag'=>$hashtag,
            ]);
        }
        return back();
    }

    public function editProfile($id){
//        dd('hi');
        $user=\App\User::find($id);
        return view('artist.pages.posts.editProfile',compact('user'));
    }
    public function updateProfile(Request $request,$id){

//        $birthdate=$request->input('birthdate');
//        $birthdate=str_replace('۱','1',$birthdate);
//        dd($birthdate);

        $birthdate = $request->input('birthdate');
        $exploded_date = explode("/",$birthdate);
        $year = $exploded_date[0];
        $month = $exploded_date[1];
        $day = $exploded_date[2];
        $miladi = \Morilog\Jalali\CalendarUtils::toGregorian($year, $month, $day);
        $miladi = implode("-",$miladi);

//        dd($miladi);

        $user=\App\User::find($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],

//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

            'lastname' => ['required', 'string'],

//            'username' => ['required','alpha_dash','unique:users'],

            'phone' => ['required','numeric','starts_with:09'],

//            'country' => ['string'],
        ]);


        $user->update([
            'bio' => \request('bio'),
            'phone' => \request('phone'),
            'lastname' => \request('lastname'),
            'name' => \request('name'),
            'country' => \request('country'),
            'birthdate' => $miladi,
        ]);

        if($request->input('email')){
            $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
            $user->update([
            'email' => $request->input('email'),
            'email_verified_at'=>null,
            ]);
        }

        if($request->input('username')){
            $request->validate([
            'username' => ['required','alpha_dash','unique:users'],
            ]);
            $user->update([
                'username' => $request->input('username'),
            ]);
        }


//        if ($request->input('photo')){
//            $path=$request->input('photo')->store('profile_pics');
//            $fixed_path='storage/'.$path;
//            $user->profile_pic=$fixed_path;
//            $user->update();
//        }

//        return redirect(route('artist.post.index'));
            return back();
        }

        public function updateProfilePic(Request $request,$id){

//            dd($request->all());
            $user=\App\User::find($id);
            $path=$request->file('photo')->store('profile_pics');
            $fixed_path='storage/'.$path;
//            $path=$request->input('photo')->store('profile_pics');
//            $fixed_path='storage/'.$path;
            $user->profile_pic=$fixed_path;
            $user->update();

            return back();
        }

        public function search($id){

//        $posts=Post::

        }



}
