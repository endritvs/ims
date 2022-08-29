<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
 
    public function create()
    {
        return view('auth.register');
    }


    public function store(Request $request)
    {  
         $img =  $request->hasFile('img');
        $request->validate([
            'name' => ['required', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:25'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/ ', 'confirmed', Rules\Password::defaults()],
        ]);
     
        if ($img) {
            $newImg = $request->file('img');
            $img_path = $newImg->store('/public/img');
            $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'img' => $img_path,
        ]); 
        event(new Registered($user));

         Auth::login($user);
    }else{

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'img'=>"public/noProfilePhoto/nofoto.jpg"
        ]);
  
        event(new Registered($user));

        Auth::login($user);
    }
 

        return redirect(RouteServiceProvider::HOME);
    }
}