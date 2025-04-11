<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function login()
    {
        return view('login.login', [
            'title' => 'Login Page',
            'active'=> 'Login'
        ]);
    }

    public function register ()
    {
        return view('login.register', [
            'title' => 'Register Page',
            'active'=> 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:8|max:255|unique:App\Models\User,username',
            'phone' => 'required|numeric|digits_between:10,13',
            'gender' => 'required',
            'email' => 'required|email:dns|unique:App\Models\User,email',
            'password' => 'required|min:5|max:255'
        ]);

        $credentials['password'] = Hash::make($credentials['password']);
        
        User::create($credentials);

        return redirect('/login')->with('success', 'Registration Complete, Request login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError','The provided credentials do not match our records.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
 
        return redirect('/');
    }
}
