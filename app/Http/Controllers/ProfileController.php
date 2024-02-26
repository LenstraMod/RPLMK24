<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile($username){
        $user = User::where('username',$username)->with('posts')->first();
        return view('profile', compact('user'));
    }
}
