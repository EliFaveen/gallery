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

//Route::get('/home', 'HomeController@index')->name('home');

//my routes

//--------->artist

//Route::resource('artist\post','Artist\PostController');
//todo: add middleware auth & is artist
Route::prefix('artist')->namespace('Artist')->name('artist.')
    ->group(function (){
        Route::resource('post','PostController');


        //-------artist        /artist/post---->.post.store                     //POST
        //-------artist        /artist/post---->artist.post.index               //POST//no it's GET
        //-------artist        /artist/post/create---->artist.post.create       //GET
        //-------artist        /artist/post/{post}---->artist.post.update       //PUT/PATCH
        //-------artist        /artist/post/{post}---->artist.post.show         //GET
        //-------artist        /artist/post/{post}---->artist.post.destroy      //DELETE
        //-------artist        /artist/post/{post}/edit---->artist.post.edit    //GET


    });
Route::get('artist/home', 'HomeController@index')->name('artist.home');//== artist.post.index
