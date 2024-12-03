<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!Auth::check()){
            return redirect()->route('login');
        }

        $user = Auth::user();

        if ($user->roles->contains('name', 'developer')){
            return $next($request);
        }

        if (!Auth::user()->roles->contains('name', $role)){
            abort(403, 'Você não tem permissão para acessar essa página.');
        }
        return $next($request);
    }
}
