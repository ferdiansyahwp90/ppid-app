<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfNotVerified
{
    public function handle($request, Closure $next)
    {
        if (!$request->user()->isVerified()) {
            return redirect()->route('send-verification-email');
        }

        return $next($request);
    }
}
