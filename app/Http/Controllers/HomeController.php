<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        return view('artist.pages.posts.index');
    }

    public function comment(Request $request){
//        if (!$request->ajax()){
//            return response()->json([
//                'status'=>'just ajax requests'
//            ]);
//
//        }

        $validData = $request->validate([
            'commentable_id' => 'required',
            'commentable_type' => 'required',
            'parent_id' => 'required',
            'comment' => 'required'
        ]);

        auth()->user()->comments()->create($validData);

//        return response()->json([
//           'status'=>'success'
//        ]);

//        alert()->success('نظر با موفقیت ثبت شد');//doesnt show my alert its not sweetalert

        return back();
    }
}

