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
    return view('site');
});
//Route::group(['middleware' => 'disablepreventback'],function(){
    Auth::routes(['verify'=>true]);

//});


//Route::get('/home', 'HomeController@index')->name('home');

//my routes

//--------->artist

//Route::resource('artist\post','Artist\PostController');
//todo: add middleware auth & is artist
Route::prefix('artist')->namespace('Artist')->name('artist.')->middleware(['auth','isArtist'])
    ->group(function (){
        Route::resource('post','PostController');
//-----------post
            Route::patch('post/update-hashtag/{post}','PostController@updateHashtag')->name('post.updateHashtag');
            Route::patch('post/update-category/{post}','PostController@updateCategory')->name('post.updateCategory');
            Route::get('post/edit-profile/{user}','PostController@editProfile')->name('post.editProfile');
            Route::patch('post/update-profile/{user}','PostController@updateProfile')->name('post.updateProfile');
            Route::patch('post/update-profilepic/{user}','PostController@updateProfilePic')->name('post.updateProfilePic');
//            Route::get('post/search/{hashtag}','PostController@search')->name('.post.search');


//----------home
        Route::get('home/post','HomeController@index')->name('home.index');//show following users post or all
        Route::get('home/post/{user}','HomeController@index_user')->name('home.index_user');//show following users post or all
        Route::post('home/follow-unfollow/{follower}/{following}','HomeController@follow_unfollow')->name('home.follow_unfollow');//show following users post or all
        Route::get('home/show-followings/{user}','HomeController@showFollowings')->name('home.showFollowings');
        Route::get('home/show-followers/{user}','HomeController@showFollowers')->name('home.showFollowers');
        Route::get('home/popular','HomeController@index_popular')->name('home.index_popular');

//-----------notifications
        Route::get('notifications','NotifiyController@index')->name('notification');
        Route::get('like_visited/{like}','NotifiyController@like_visited')->name('like_visited');
        Route::get('comment_visited/{comment}','NotifiyController@comment_visited')->name('comment_visited');
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
            Route::get('post/restore/{post}','PostController@restore')->name('post.restore');
            Route::get('post/edit-category/{post}','PostController@editCategory')->name('post.editCategory');
            Route::patch('post/update-category/{post}','PostController@updateCategory')->name('post.updateCategory');
            Route::get('post/edit-hashtag/{post}','PostController@editHashtag')->name('post.editHashtag');
            Route::patch('post/update-hashtag/{post}','PostController@updateHashtag')->name('post.updateHashtag');
            Route::delete('post/delete-photo/{photo}','PostController@deletePhoto')->name('post.deletePhoto');

        Route::resource('users','UserController');
        Route::resource('comments','CommentController');

        Route::resource('home','HomeController');

        //-------artist        /admin/category---->artist.post.store                     //POST
        //-------artist        /admin/category---->artist.post.index               //POST//no it's GET
        //-------artist        /admin/category/create---->artist.post.create       //GET
        //-------artist        /admin/category/{category}---->artist.post.update       //PUT/PATCH
        //-------artist        /admin/category/{category}---->artist.post.show         //GET
        //-------artist        /admin/category/{category}---->artist.post.destroy      //DELETE
        //-------artist        /admin/category/{category}/edit---->artist.post.edit    //GET


    });
//Route::get('/artist/post', 'HomeController@index')->name('artist.post.index');//== artist.post.index

//---------------->comments
Route::post('comments',"HomeController@comment")->name('send.comment');
Route::delete('comments/{comment}',"HomeController@destroyComment")->name('delete.comment');






//--------------------------------------------------trash
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

//--------------->sweetalert testing
Route::get('my-notification/{type}', 'HomeController@myNotification');

//http://localhost:8000/my-notification/success
//
//http://localhost:8000/my-notification/basic
//
//http://localhost:8000/my-notification/message
