<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPayment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
{
    $user = auth()->user();

    if (!$user->hasPaid()) {
        return redirect('/payment')->with('error', 'Vous devez payer pour accéder à ce contenu.');
    }

    return $next($request);
}

}
