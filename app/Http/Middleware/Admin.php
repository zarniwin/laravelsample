<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){// check already login
            if(Auth::user()->hasAnyRole(['super_admin','admin'])){// check Role
                return $next($request);
            }else{
                Auth::logout();// remove session
                return redirect()->route('login');// return login route
            }
        }else{
            return redirect('/');
        }                
    }
}
