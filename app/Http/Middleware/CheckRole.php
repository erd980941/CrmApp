<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Kullanıcının rollerini kontrol et
        $user = auth()->user();
        if ($user->hasRole($roles)) {
            return $next($request);
        }

        return redirect()->route('home')->with('error', 'You do not have access to this page');
    }
}
