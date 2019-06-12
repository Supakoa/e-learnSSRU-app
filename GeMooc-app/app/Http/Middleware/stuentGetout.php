<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

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
        // dd($request->path());
        if (!auth()->check() && $request->path() != "login") {
            Session::flash('message', "can't access to this side.");
            return redirect()->route('login');
        }
        elseif(!auth()->user()->canInside() && $request->path() != "home"){
            // Auth::logout();
            // Session::flush();
            Session::flash('message', "can't access to this side.");
            return redirect()->route('dashboard.home');
        }

        return $next($request);
    }
}
