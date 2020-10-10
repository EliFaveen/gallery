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
        //
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
//        //dd($request->all());
        $post=Post::create([
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'user_id'=>1,//todo: take it from auth()

        ]);


//        simple multiple photo upload
        foreach ($request->file('photos') as $photo)
        {
            $path=$photo->store('postphotos');
            $fixed_path='storage/'.$path;

            Photo::create([
                'img_url'=>$fixed_path,
                'post_id'=>$post->id,
            ]);
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
        foreach ($request->input('categories') as $category)
        {
            CategoryPost::create([
               'post_id'=>$post->id,
               'category_id'=>$category,
            ]);
        }
        foreach ($request->input('hashtags') as $hashtag)
        {
            Hashtag::create([
                'post_id'=>$post->id,
                'hashtag'=>$hashtag,
            ]);
        }

        return redirect(route('artist.home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
