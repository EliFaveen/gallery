<?php

namespace App\Http\Controllers\Admin;

use App\Category;
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

            $posts=Post::orderBy('created_at','desc')->withTrashed()->with('categories')
                ->when(\request('category_id') > 0,function ($query){$query->where('category_id',\request('category_id'));})
                ->paginate(20);

//        $post=Post::find(12);
//        return $post->hashtags;


        return view('admin.pages.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //empty
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //empty
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

//        $post=Post::find($id)->with('categories')
//            ->when(\request('category_id') > 0,function ($query){$query->where('category_id',\request('category_id'));});

        $post=Post::find($id);
        return view('admin.pages.post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        dd('hi');
        $post=Post::find($id);
        return view('admin.pages.post.edit',compact('post'));
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
        //        simple multiple photo upload
        $post=Post::find($id);
        if ($request->file('post_pics')){
            foreach ($request->file('post_pics') as $photo)
            {
                $path=$photo->store('postphotos');
                $fixed_path='storage/'.$path;
                Photo::create([
                    'img_url'=>$fixed_path,
                    'post_id'=>$post->id,
                ]);
            }
        }
        $post->title=$request->input('title');
        $post->description=$request->input('description');
        $post->update();

        return redirect(route('admin.post.show',['post'=>$id]));
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
        return back();
    }

    public function restore($id)
    {
//        dd('hi');
        Post::withTrashed()->find($id)->restore();
        return back();
    }
    public function editCategory($id){
        $post=Post::find($id);
        return view('admin.pages.post.editCategory',compact('post'));
    }
    public function updateCategory(Request $request,$id){


        $post=Post::find($id);
//        if ($request->has('categories')){

        $post_categories=CategoryPost::where('post_id',$id)->get();
        foreach ($post_categories as $post_category){
            $post_category->delete();
        }
//                return $post_categories;
        foreach ($request->input('categories') as $category)
        {
            CategoryPost::create([
                'post_id'=>$post->id,
                'category_id'=>$category,
            ]);
        }
        return redirect(route('admin.post.index'));
    }
    public function editHashtag($id){
        $post=Post::find($id);
        return view('admin.pages.post.editHashtag',compact('post'));
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
        return redirect(route('admin.post.index'));
    }

    public function deletePhoto($id){
//        dd('hi');
        Photo::find($id)->delete();
        return back();
    }
}
