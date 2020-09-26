<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//my routes

//--------->artist

//Route::resource('artist\post','Artist\PostController');
//todo: add middleware auth & is artist
Route::prefix('artist')->namespace('Artist')->name('artist.')
    ->group(function (){
        Route::resource('post','PostController');

        //-------artist        /post---->artist.post.store               //POST
        //-------artist        /post---->artist.post.index               //POST//no it's GET
        //-------artist        /post/create---->artist.post.create       //GET
        //-------artist        /post/{post}---->artist.post.update       //PUT/PATCH
        //-------artist        /post/{post}---->artist.post.show         //GET
        //-------artist        /post/{post}---->artist.post.destroy      //DELETE
        //-------artist        /post/{post}/edit---->artist.post.edit    //GET


    });
