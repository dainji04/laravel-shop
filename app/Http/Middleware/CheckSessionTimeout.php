<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckSessionTimeout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (
            $request->session()->has('last_activity') &&
            time() - $request->session()->get('last_activity') > config('session.lifetime') * 60
        ) {

            Auth::logout();
            return redirect()->route('login');
        }

        $request->session()->put('last_activity', time());

        return $next($request);
    }
}
