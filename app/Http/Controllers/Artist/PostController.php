<?php

namespace App\Http\Controllers\Artist;

use App\CategoryPost;
use App\Comment;
use App\Hashtag;
use App\Http\Controllers\Controller;
use App\Photo;
use App\Post;
use App\Like; //i added this
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
        $posts=Post::orderBy('created_at','desc')->paginate(9);
//        foreach ($posts as $post)
//        {
//            dd($post);
//        }

        //$photos=ProductPhoto::get();
        return view('artist.pages.posts.index',compact('posts'));
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

}
