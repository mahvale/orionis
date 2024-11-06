<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class authSession
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
         if (! $request->session()->has('my_session')) {
            // Rediriger l'utilisateur s'il n'a pas la variable de session
            return redirect('/login')->with('error', 'Session variable not found');
        }
        return $next($request);
    }
}
