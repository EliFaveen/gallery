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

//    public function redirectTo()
//    {
//        if (auth()->user()->is_admin) {
//            return '/admin/home';
//        } else if (auth()->user()->is_artist) {
//            return '/artist/home';
//        } else if (auth()->user()->is_unartisted) {
//            return '/user/home';
//        } else if (auth()->user()->is_user) {
//            return '/user/home';
//        } else {
//            return '/home';
//        }
//    }
    protected $redirectTo = '/artist/home';
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
