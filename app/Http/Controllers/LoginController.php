<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login',[
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role_id == 1) {
                return redirect()->route('dashboard','index');
            }

            if ($user->role_id == 2) {
                return redirect()->route('home', 'index');
            }
        }

        return back()->with('loginError', 'Login failed');

    }

    public function login(Request $request)
    {
        $remember_me = $request->remember ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember_me)) {

            $user = Auth::user();
            if ($user->role_id == 1) {
                return redirect()->route('dashboard','index');
            }

            if ($user->role_id == 2) {
                return redirect()->route('home', 'index');
            }
        }
        return back()->with('loginError', 'Login Failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('index');
    }
}
