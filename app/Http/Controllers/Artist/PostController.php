<?php

namespace App\Http\Controllers\Artist;

use App\CategoryPost;
use App\Hashtag;
use App\Http\Controllers\Controller;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::orderBy('created_at','desc')->paginate(8);
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

        $post=Post::create([
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'user_id'=>1,//todo: take it from auth()

        ]);


//        simple multiple photo upload
        if ($request->file('photos')){
            foreach ($request->file('photos') as $photo)
            {
                $path=$photo->store('postphotos');
                $fixed_path='storage/'.$path;

                Photo::create([
                    'img_url'=>$fixed_path,
                    'post_id'=>$post->id,
                ]);
            }
        }

//        ---------------------------------------------------croppie
//        $image = $request->image;
//        //return view('artist.pages.posts.create');
////        $image=$request->file('photos');
//
//        list($type, $image) = explode(';', $image);
//        list(, $image)      = explode(',', $image);
//        $image = base64_decode($image);
//        $image_name= time().'.png';
//        $path = public_path('upload/'.$image_name);
//
//        file_put_contents($path, $image);
//        return response()->json(['status'=>true]);




//        //todo:add photo to category
//        foreach ($request->input('categories') as $category)
//        {
//            CategoryPost::create([
//               'post_id'=>$post->id,
//               'category_id'=>$category,
//            ]);
//        }
//        foreach ($request->input('hashtags') as $hashtag)
//        {
//            Hashtag::create([
//                'post_id'=>$post->id,
//                'hashtag'=>$hashtag,
//            ]);
//        }

        return redirect(route('artist.post.index'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
//
//    public function postLikePost(Request $request)
//    {
//        $post_id = $request['postId'];
//        $is_like = $request['isLike'] === 'true';
//        $update = false;
//        $post = Post::find($post_id);
//        if (!$post) {
//            return null;
//        }
//        $user = Auth::user();
//        $like = $user->likes()->where('post_id', $post_id)->first();
//        if ($like) {
//            $already_like = $like->like;
//            $update = true;
//            if ($already_like == $is_like) {
//                $like->delete();
//                return null;
//            }
//        } else {
//            $like = new Like();
//        }
//        $like->like = $is_like;
//        $like->user_id = $user->id;
//        $like->post_id = $post->id;
//        if ($update) {
//            $like->update();
//        } else {
//            $like->save();
//        }
//        return null;
//    }

}
