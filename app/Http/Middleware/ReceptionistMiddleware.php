<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ReceptionistMiddleware
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
            if ($role->name == 'Receptionist') {
                return $next($request);
            }
        }
        return redirect('/')->with('message', 'Do not have previlage to access to Receptionist Dashboard');
    }
}
