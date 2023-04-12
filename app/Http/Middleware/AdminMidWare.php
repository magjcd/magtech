<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMidWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(\Auth::check()){
            if(\Auth::user()->roles == 'admin'){
                return $next($request);
            }else{
                return redirect('/')->with("message","You're not an Admin");
            }
        }else{
            return redirect('/login')->with("message","You're not authorized an user");
        }
        return $next($request);
    }
}
