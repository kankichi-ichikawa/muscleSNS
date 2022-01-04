<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // User覧
    public function index()
    {
        return \App\User::all();
    }
    
    //followとunfollow
    public function follow(User $user){
        // return $user->follows()->attach(Auth::user()->id);
        Auth::user()->follows()->attach($user->id);

    }
    
    public function unfollow(User $user){
        // return $user->follows()->attach(Auth::user()->id);
        Auth::user()->follows()->detach($user->id);

    }
}
