<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin(){return view('auth.signin');}
    public function showRegister(){return view('auth.register');}

    public function login(Request $request){
        $credentials = $request->validate([
            'email'=> 'required|email',
            'password'=> 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('admin.index'); 
        }
        throw ValidationException::withMessages([
            'credentials'=> 'Credentials doesn\'t match!!!' 
        ]);
    }
    public function register(Request $request){
        $credentials = $request->validate([
            'email'=>'required|email|unique:users',
            'name'=> 'required',
            'password'=>'required|string|min:4|confirmed'
        ]);

        $user = User::create($credentials);
        Auth::login($user);
        return redirect()->route('admin.index');
    }
    public function logout(Request $request){
        Auth::logout();
        //clearing session
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return  redirect()->route('show.login');
    }
}
