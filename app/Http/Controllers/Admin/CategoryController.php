<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd('hi');
        //        todo:multisearch
        $categories=\App\Category::orderBy('created_at','desc');

        if (\request()->filled('search-title')){
            $categories=$categories->where('title','LIKE',"%".\request('search-title')."%");
        }


        $categories=$categories->paginate(3);

//        $categories=\App\Category::orderBy('created_at','desc')->paginate(3);
        return view('admin.pages.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'category_pic' => ['required ',' image ',' mimes:jpeg,png,jpg',' max:2048'],
        ]);
        $path=$request->file('category_pic')->store('categories_pic');
        $fixed_path='storage/'.$path;

        Category::create([
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'category_pic'=>$fixed_path,

        ]);
        //return 'added';
        return redirect(route('admin.category.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category=Category::find($id);
        return view('admin.pages.category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::find($id);
        return view('admin.pages.category.edit',compact('category'));
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
        //dd($request->all());
        $category=Category::find($id);
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
//            'category_pic' => ['required', 'string'],
        ]);

        $category->title=$request->input('title');
        $category->description=$request->input('description');

        if ($request->has('category_pic')){
            $path=$request->file('category_pic')->store('categories_pic');
            $fixed_path='storage/'.$path;
            $category->category_pic=$fixed_path;

        }

        $category->update();
        return redirect(route('admin.category.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //later--if i delete category then all the posts who have this category their category should delete
//        todo: i dont know above
        Category::find($id)->delete();
        return redirect(route('admin.category.index'));

    }
}
