<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

            $currentUser = Auth::user();

            if ($currentUser->isSuperUser()) 
            {

                return redirect('/admin');
            } else if ($currentUser->isMerchant()) {

                return redirect('/merchant');
            } else {
                return redirect('/');
            }
        }

        return $next($request);
    }
}
