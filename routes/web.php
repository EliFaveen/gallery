<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
//    \alert()->success('welcome','message');
    return view('welcome');
//    return \Carbon\Carbon::now()->subDay(2);
//    return \Morilog\Jalali\Jalalian::now();
//    return jdate()->subDays(2);

});

Auth::routes(['verify'=>true]);

//Route::get('/home', 'HomeController@index')->name('home');

//my routes

//--------->artist

//Route::resource('artist\post','Artist\PostController');
//todo: add middleware auth & is artist
Route::prefix('artist')->namespace('Artist')->name('artist.')
    ->group(function (){
        Route::resource('post','PostController');


        //-------artist        /artist/post---->artist.post.store                     //POST
        //-------artist        /artist/post---->artist.post.index               //POST//no it's GET
        //-------artist        /artist/post/create---->artist.post.create       //GET
        //-------artist        /artist/post/{post}---->artist.post.update       //PUT/PATCH
        //-------artist        /artist/post/{post}---->artist.post.show         //GET
        //-------artist        /artist/post/{post}---->artist.post.destroy      //DELETE
        //-------artist        /artist/post/{post}/edit---->artist.post.edit    //GET


    });
Route::post('/like','Artist\PostController@postLikePost')->name('like');
//---------------------------------------------------------------------------------------------------cropper
Route::get('image-cropper/{post_id}','Artist\ImageCropperController@index')->name('image_cropper');
Route::post('image-cropper/upload/{post_id}','Artist\ImageCropperController@upload');

Route::prefix('admin')->namespace('Admin')->name('admin.')->middleware(['auth','isAdmin'])
    ->group(function (){
        Route::resource('category','CategoryController');
        Route::resource('post','PostController');
        Route::resource('users','UserController');
        Route::resource('comments','CommentController');

        //-------artist        /admin/category---->artist.post.store                     //POST
        //-------artist        /admin/category---->artist.post.index               //POST//no it's GET
        //-------artist        /admin/category/create---->artist.post.create       //GET
        //-------artist        /admin/category/{category}---->artist.post.update       //PUT/PATCH
        //-------artist        /admin/category/{category}---->artist.post.show         //GET
        //-------artist        /admin/category/{category}---->artist.post.destroy      //DELETE
        //-------artist        /admin/category/{category}/edit---->artist.post.edit    //GET


    });
//Route::get('/artist/post', 'HomeController@index')->name('artist.post.index');//== artist.post.index




Route::get('/secret',function (){
     Alert::success('hello');
    return view('welcome');
 });//i changed the middlewares here

Route::post('/post',function (Request $request){
    //validation
//    $request->validate([
//        'title' => 'required|min:3',
//        'body' => 'required|min:3'
//    ]);
    Alert::success('hello');
    return redirect('/')->with('success','here is redirection');
});//

//---------------->comments
Route::post('comments',"HomeController@comment")->name('send.comment');
Route::delete('comments/{comment}',"HomeController@destroyComment")->name('delete.comment');
