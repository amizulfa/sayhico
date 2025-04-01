<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminLayoutMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Tambahkan session is_admin jika user adalah admin
        if (auth()->check() && (auth()->user()->email === 'admin@admin.com' || auth()->user()->email === 'admin')) {
            session(['is_admin' => true]);
        }

        return $next($request);
    }
}
