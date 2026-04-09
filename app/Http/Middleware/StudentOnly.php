<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentOnly
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check() || auth()->user()->usertype !== 'user') {
            abort(403, 'Khusus siswa.');
        }

        return $next($request);
    }
}
