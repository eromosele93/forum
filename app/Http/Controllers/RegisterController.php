<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
   
    public function create()
    {
        return view('register.create');
    }

    
    public function store(Request $request, User $user)
    {
        if($request->input('password') === $request->input('confirm_password') ){
            $data = $request->validate([
                'email' => 'required|email',
                'password'=> 'required|min:8|max:25',
                'name'=> 'required|min:10|max:255'
            ]);
    
    $user->name = $data['name'];
    $user->email = $data['email'];
    $user->password = Hash::make($data['password']);
    $user->save();


    //Login
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);
    $credentials = $request->only('email', 'password');
    $remember = $request->filled('remember');
    if(Auth::attempt($credentials, $remember)){
    return redirect()->intended('/')->with('success', 'Registration successful');
    }else{
        return redirect()->route('main')->with('error', 'Login failed');
    }
        }
   else{
    return redirect()->route('register.create')->with('error', 'Password does not match');
   }
 
    }

   
}
