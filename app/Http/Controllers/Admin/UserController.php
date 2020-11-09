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
        $users=User::orderBy('created_at','desc')->paginate(8);
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
            'name' => ['required', 'string', 'max:255'],

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

            'password' => ['required', 'string', 'min:8', 'confirmed'],

            'lastname' => ['required', 'string'],

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

            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],

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
                'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        //
    }
}
