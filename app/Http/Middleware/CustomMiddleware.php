<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Session;


use Closure;

class CustomMiddleware
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
        if (Session::has('company')) {
            return $next($request);
        } else {
            return redirect()->route('login');
        }
    }
}
