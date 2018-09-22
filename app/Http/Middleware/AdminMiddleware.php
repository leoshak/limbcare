<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        // dd(Auth::user()->roles[1]->name);
        foreach (Auth::user()->roles as $role) {
            if ($role->name == 'administrator') {
                return $next($request);
            }
            return redirect('/');
        }
    }
}
