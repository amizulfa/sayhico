<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('is_admin')) {
            return redirect()->route('login')->withErrors(['error' => 'Anda tidak memiliki akses ke halaman ini.']);
        }

        return $next($request);
    }
}

