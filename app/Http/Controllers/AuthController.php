<?php

namespace App\Http\Controllers;
use App\User;
Use Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view ('auths.login');
    }

    public function postLogin(Request $request)
    {
        if(!Auth::attempt(['email' => $request->email,'password' => $request->password])){
            return redirect()->back();
        }
        return redirect('/dashboard');
    }
    
    public function getRegister()
    {
        return view ('auths.register');
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::LoginUsingId($user->id);

        return redirect('/dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    public function forgot()
    {
        return view('auths.forgot');
    }
}
