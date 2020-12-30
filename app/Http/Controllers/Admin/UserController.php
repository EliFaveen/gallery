<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        todo: search
//        $users = User::query();
//        if ($keyword=\request('search')){
//
//            $users->where('email','LIKE',"%{$keyword}%")
//                ->orWhere('username','LIKE', "%{$keyword}%")
//                ->orWhere('phone','LIKE', "%{$keyword}%");
//
//        }
//        if ($keyword=\request('role')){
//
//            $users->where('role','LIKE',"%{$keyword}%");
//
//        }
//
//        if ($keyword=\request('email_verified_at')){
//            if(\request('email_verified_at') == 1)
//            {
//                $users->whereNotNull('email_verified_at');;
//
//            }elseif (\request('email_verified_at') == 2){
//
//                $users->whereNull('email_verified_at');
//            }
//            else{
////                return null;
//            }
//
//        }
//        $users = $users->orderBy('created_at','desc')->paginate(8);

//        todo:multisearch
        $users=User::orderBy('created_at','desc');

        if (\request()->filled('search-username')){
            $users=$users->where('username','LIKE',"%".\request('search-username')."%");
        }
        if (\request()->filled('search-email')){
            $users=$users->where('email','LIKE',"%".\request('search-email')."%");
        }
        if (\request()->filled('search-phone')){
            $users=$users->where('phone','LIKE',"%".\request('search-phone')."%");
        }
//        if (\request()->filled('search')){
//
//            $users->where('email','LIKE',"%".\request('search')."%")
//                ->orWhere('username','LIKE', "%".\request('search')."%")
//                ->orWhere('phone','LIKE', "%".\request('search')."%");
//
//        }


        if (\request()->filled('role')){
            $users=$users->where('role','LIKE',"%".\request('role')."%");
        }

        if (\request()->filled('email_verified_at')){
            if(\request('email_verified_at') == 1) {
                $users->whereNotNull('email_verified_at');

            }elseif (\request('email_verified_at') == 2){

                $users->whereNull('email_verified_at');
            }
            else{
//                return null;
            }
        }

        $users=$users->paginate(20);

        return view('admin.pages.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'alpha', 'max:255'],

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users','ends_with:.com'], //,'regex:/\.com/i'

            'password' => ['required', 'string', 'min:8', 'confirmed','not_regex:/^.*(?=.*[;,"\']).*$/'],

            'lastname' => ['required', 'alpha'],

            'username' => ['required','alpha_dash','unique:users'],

            'phone' => ['required','numeric','starts_with:09'],
        ]);
//        $user=User::create($data);
//
//        if($request->has('verify')){ //check box haro check mikonad ke aya true hast verify ta na
//            $user->markEmailAsVerified();
//        }
//        dd($data);
         $user=User::create([
             'name' => $request['name'],
             'email' => $request['email'],
             'password' =>$request['password'],
             'lastname' => $request['lastname'],
             'username' => $request['username'],
             'phone' => $request['phone'],
             'role' => $request['role'],

         ]);

        if($request->has('verify')){ //check box haro check mikonad ke aya true hast verify ta na
            $user->markEmailAsVerified();
        }
        return redirect(route('admin.users.index'));
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
        $user=User::find($id);
        return view('admin.pages.users.edit',compact('user'));
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
        $user=User::find($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],

            'email' => ['required', 'string', 'email', 'max:255','ends_with:.com', Rule::unique('users')->ignore($user->id)],

//            'password' => ['required', 'string', 'min:8', 'confirmed'],

            'lastname' => ['required', 'string'],

            'username' => ['required','alpha_dash',Rule::unique('users')->ignore($user->id)],

            'phone' => ['required','numeric','starts_with:09'],
        ]);
//        dd($request->all());

        $user->update([
            'name'=>$request->input('name'),
            'lastname'=>$request->input('lastname'),
            'email'=>$request->input('email'),
            'username'=>$request->input('username'),
            'phone'=>$request->input('phone'),
            'role'=>$request->input('role'),
        ]);

        if (! is_null($request->password)){
            $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed','not_regex:/^.*(?=.*[;,"\']).*$/'],
            ]);

            $user->update([
               'password'=>$request->input('password'),
            ]);
        }

        if($request->has('verify')){ //check box haro check mikonad ke aya true hast verify ta na
            $user->markEmailAsVerified();
        }


        return redirect(route('admin.users.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
//        return redirect(route('admin.users.index'));
        return back();
    }
}
