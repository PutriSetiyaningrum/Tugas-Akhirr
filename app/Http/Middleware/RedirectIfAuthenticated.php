<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $guard = NULL)
    {
        if (Auth::guard($guard)->check()) {
            if (Auth::user()->level == "pengurus") {
                return redirect("/home");
            } else if (Auth::user()->level == "panitia") {
                return redirect("/panitia/home");
            } else if (Auth::user()->level == "pelatih") {
                return redirect("/pelatih/home");
            } else if (Auth::user()->level == "pengunjung") {
                return redirect("/pengunjung/home");
            }
        }

        return $next($request);
    }
}
