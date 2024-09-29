<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         // Check if the user is logged in and is an admin
        if (Auth::check() && Auth::user()->type === 'admin') {
            return $next($request); // Continue if the user is admin
        }

         // Redirect to home page if the user is not an admin
         return redirect('/');
    }
}
