<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class Admin
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
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::check() && Auth::user()->role_id == 1) {

            return $next($request);
        }
        else {
            return redirect()->route('login');
        }

        if (Auth::check() && Auth::user()->role_id == 2) {
            
            return redirect()->route('teacher/dashboard');
        }
        else {
            return redirect()->route('login');
        }

        if (Auth::check() && Auth::user()->role_id == 3) {
            return redirect()->route('student/dashboard');
        }
        else {
            return redirect()->route('login');
        }
    }
}
