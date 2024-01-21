<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Facade;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    // public function show()
    // {
    //     return view('settings');
    // }

    public function show(){
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        return view('settings', [
            'user' =>   $user ,

        ]);
    }

    public function store()
    {

        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'max:255', 'min:3', Rule::unique('users', 'username')],
            'email' => ['required', 'max:255', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'max:255', 'min:7']
        ]);

       $user =  User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('success', 'your account has been created');
    }

    public function update(RegisterController $user)
    {
        // ddd($user);
        $id = Auth::user()->id;
        $user = User::findOrFail($id);

        $attributes = request()->validate([
            'name' => ['required'],
            'username' =>['required'],
            'email' =>['required']

        ]);
        // if($request->input("name")!=null)$user->name = $request->input("name");
        // if($request->input("email")!=email)$user->email = $request->input("email");


        $user->update($attributes);

        return back()->with('sucess', ' post updated!');
    }

    // public function edit(Post $post){
    //     return view('settings', ['post'=> $post]);
    // }

}
