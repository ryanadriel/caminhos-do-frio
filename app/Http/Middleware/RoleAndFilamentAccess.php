<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleAndFilamentAccess
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('filament.admin.auth.login');
        }

        // Redireciona clientes para a página inicial ao acessar o painel administrativo
        if ($user->roles->contains('name', 'client')) {
            if ($request->is('admin*')) {
                return redirect()->route('home')->with('error', 'Você não tem permissão para acessar esta área.');
            }

            // Certifica-se de que um cliente sempre vá para a home após login
            if ($request->is('filament.admin.auth.login')) {
                return redirect()->route('home');
            }
        }

        // Verifica permissões para rotas específicas
        if ($request->is('pacote/*') && !$user->roles->contains('name', 'client')) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
