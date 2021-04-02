<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthorMiddleware
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
        if (Auth::user() && Auth::user()->level_id == 2) {
            return $next($request);
        } elseif (Auth::user() && Auth::user()->level_id == 1) {
            return redirect()->route('admin');
        } else {
            return redirect()->route('login');
        }
    }
}
