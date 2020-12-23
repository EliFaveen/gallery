<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME; // that redirect shit

//    public function redirectTo()
//    {
//        if (auth()->user()->role === 'admin') {
//            return '/admin/category';
//        } else if (auth()->user()->role === 'artist') {
//            return '/artist/post';
//        } else if (auth()->user()->role === 'unartist') {
//            return '/';
//        } else if (auth()->user()->role === 'user') {
//            return '/';
//        } else {
//            return '/';
//        }
//    }
//    protected $redirectTo = '/artist/post';
    public function redirectTo()
    {
        if (auth()->user()->role === 'admin') {
//            dd(auth()->user()->role);
            return '/admin/home';
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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'alpha', 'max:255'],

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

            'password' => ['required', 'string', 'min:8', 'confirmed','not_regex:/^.*(?=.*[;,"\']).*$/'],

            'lastname' => ['required', 'alpha'],

            'username' => ['required','alpha_dash','unique:users'],

            'phone' => ['required','numeric','starts_with:09'],
        ],[
            'regex'=> 'پسورد باید حداقل شامل یک حرف یک عدد و یک کاراکتر معتبر باشد',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //dd('hi');
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'lastname' => $data['lastname'],
            'username' => $data['username'],
            'phone' => $data['phone'],
            'role' => $data['role'],
            //todo: add other fields
        ]);
        //it redirects to home controller

    }
}
