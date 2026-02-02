<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Pas connecté
        if (!$user) {
            return redirect()->route('login');
        }

        // Pas ADMIN
        if ($user->role !== User::ADMIN_ROLE) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
