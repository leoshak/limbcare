<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

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
        if(Auth::guest()){
            return redirect('/')->with('message', 'Guests do not have access to dashboard');
        }
        // dd(Auth::user()->roles[1]->name);
        foreach (Auth::user()->roles as $role) {
            if ($role->name == 'administrator') {
                return $next($request);
            }
        }
        return redirect('/')->with('message', 'Do not have previlage to access to Admin(CEO) Dashboard');
    }
}
