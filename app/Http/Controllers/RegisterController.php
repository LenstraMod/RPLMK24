<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function registerForm(){
        return view("auth.register");
    }

    public function register(Request $request){
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = new User;
        $user->fill([
            'username' => $request->username,
            'email'=> $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->save();

        return redirect()->route('loginForm')->with('success','Register Berhasil');
    }
}
