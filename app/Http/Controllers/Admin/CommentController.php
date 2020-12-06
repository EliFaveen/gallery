<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $comments = Comment::orderBy('created_at','desc')->paginate(8);
//        return view('admin.pages.comments.index',compact('comments'));

//        todo:multisearch
        $comments=Comment::orderBy('created_at','desc');

        if (\request()->filled('search-username')){
            //            search in relations
            $comments=$comments->whereHas('user',function ($query){
                $query->where('username','LIKE',"%".\request('search-username')."%");
            });

        }
        if (\request()->filled('search-email')){
            //            search in relations
            $comments=$comments->whereHas('user',function ($query){
                $query->where('email','LIKE',"%".\request('search-email')."%");
            });

        }
        if (\request()->filled('search-comment')){
            $comments=$comments->where('comment','LIKE',"%".\request('search-comment')."%");
        }

//        if (\request()->filled('role')){
//            $users=$users->where('role','LIKE',"%".\request('role')."%");
//        }

        if (\request()->filled('search-approved')){
            if(\request('search-approved') == 1) {
                $comments->where('approved',1);

            }elseif (\request('search-approved') == 2){

                $comments->where('approved',0);
            }
            else{
//                return null;
            }
        }

        $comments=$comments->paginate(8);

        return view('admin.pages.comments.index',compact('comments'));
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
        $comment=Comment::find($id);
        if($request->input('approved') == 'true'){
            $comment->approved=false;
        }else if($request->input('approved') == 'false'){
            $comment->approved=true;
        }else{
            return null;
        }
        $comment->update();
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        dd('hi');
        Comment::find($id)->delete();
        return back();
    }
}
