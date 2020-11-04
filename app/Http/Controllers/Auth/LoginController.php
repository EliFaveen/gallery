<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo()
    {
        if (auth()->user()->role === 'admin') {
//            dd(auth()->user()->role);
            return '/admin/category';
        } else if (auth()->user()->role === 'artist') {
//            dd(auth()->user()->role);
            return '/artist/post';
        } else if (auth()->user()->role === 'unartist') {
            return '/';
        } else if (auth()->user()->role === 'user') {
            return '/';
        } else {
            return '/';
        }
    }
//    protected $redirectTo = '/artist/post';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
