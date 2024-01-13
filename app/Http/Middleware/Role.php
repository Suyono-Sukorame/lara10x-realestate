<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if ($request->user()->role !== $role) {
            return redirect('dashboard');
        }
        return $next($request);
    }
    // public function handle(Request $request, Closure $next, $role): Response
    // {
    //     $user = $request->user();

    //     if ($user && $user->role !== $role) {
    //         return redirect('/admin/dashboard'); // Mengarahkan ke dashboard admin jika bukan admin
    //     }

    //     return $next($request);
    // }
}
