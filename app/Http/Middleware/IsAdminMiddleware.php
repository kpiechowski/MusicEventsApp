<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd(1);
        // dd(auth()->user()->is_admin);
        if(!auth()->check() || !auth()->user()->is_admin){
            return redirect('/')->with('message', 'unauthorized access');
        }
        return $next($request);
    }
}
