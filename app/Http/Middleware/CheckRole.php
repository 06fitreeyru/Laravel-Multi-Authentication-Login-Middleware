<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     *  @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        if ($role == 'admin' && Auth::user()->role_id != '1') {
            return response()->view('errors.401');
        }

        if ($role == 'employee' && Auth::user()->role_id != '2') {
            return response()->view('errors.401');
            return redirect()->back();
        }

        return $next($request);
    }
}
