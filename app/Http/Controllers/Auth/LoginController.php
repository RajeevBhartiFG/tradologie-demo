<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $loginRole="user";
        if (str_contains(URL::previous(), 'admin')) 
            $loginRole='admin';
        if (str_contains(URL::previous(), 'provider')) 
            $loginRole='provider';

        if (Auth::attempt($request->only('email', 'password'))) {
            $role = Auth::user()->role;
            if($role!=$loginRole){
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Please login with '.$loginRole." credentials",
                ]);
            }
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}

