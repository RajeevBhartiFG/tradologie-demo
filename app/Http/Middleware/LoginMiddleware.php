<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if(isset(Auth::user()->role)){
            $role = Auth::user()->role;
            if ($role === 'admin') {
                return redirect()->route('admin');
            }
            elseif ($role === 'provider') {
                return redirect()->route('provider');
            }else{
                return redirect()->route('user');
            }
        }

        return $next($request);
    }
}
