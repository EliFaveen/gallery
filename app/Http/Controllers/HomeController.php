<?php

namespace App\Http\Controllers;

use App\Comment;
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

    public function destroyComment($id){
        Comment::find($id)->delete();
        return back();
    }

//    sweetalert testing
    public function myNotification($type)
    {
        switch ($type) {
            case 'message':
                alert()->message('Sweet Alert with message.');
                break;
            case 'basic':
                alert()->basic('Sweet Alert with basic.','Basic');
                break;
            case 'info':
                alert()->info('Sweet Alert with info.');
                break;
            case 'success':
                alert()->success('Sweet Alert with success.','Welcome to ItSolutionStuff.com')->autoclose(3500);
                break;
            case 'error':
                alert()->error('Sweet Alert with error.');
                break;
            case 'warning':
                alert()->warning('Sweet Alert with warning.');
                break;
            default:
                # code...
                break;
        }


        return view('my-notification');
    }
}

