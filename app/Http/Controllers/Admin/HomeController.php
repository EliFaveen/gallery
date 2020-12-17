<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\CategoryPost;
use App\Http\Controllers\Controller;
use App\Like;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $const;

    public function index()
    {
        //barChart data
        $users=User::orderBy('created_at','desc')->get();
        foreach ($users as $user){
           $all_months[] = jdate($user->created_at)->getMonth();
        }
        for ($this->const=1 ;$this->const<=12 ; $this->const++){
            $cnt[$this->const] = count(array_filter($all_months,function($a) {return $a==$this->const;}));
        }
        //lineChart data
        $categories=Category::with('posts')->get();
        foreach ($categories as $category) {
            $cat_posts_count[]=$category->posts->count();
        }
        //pieChart data

        $like_count=Like::where('like',1)->count();
        $dislike_count=Like::where('like',0)->count();

        return view('admin.pages.home.home', [
            'all_months'=>$cnt ,
            'categories'=>$categories,
            'cat_posts_count'=>$cat_posts_count,
            'likes'=>$like_count,
            'dislikes'=>$dislike_count,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
