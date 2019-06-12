<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class stuentGetout
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
        if (!auth()->check()) {
            Session::flash('message', "can't access to this side.");
            return redirect()->route('login');
        }

        else if(!auth()->user()->canInside()){
            // Auth::logout();
            // Session::flush();
            Session::flash('message', "can't access to this side.");
            return redirect()->route('home');
        }

        return $next($request);
    }
}
