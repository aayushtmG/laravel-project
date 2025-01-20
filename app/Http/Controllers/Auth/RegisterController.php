<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create(){
        return view('auth.register');
    }
    public function store(){
        $validated = $request->validate([
            'name'=> 'required|min:6',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:4|max:20|confirmed'
        ]);
        if(!$validated){

        }
        User::create([
            'name'=> $request->name,
            'email'=> $request->email,
        ]);
    }
}
