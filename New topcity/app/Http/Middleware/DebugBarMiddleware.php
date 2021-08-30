<?php

namespace App\Http\Middleware;

use Closure;

class DebugBarMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!auth()->check() || auth()->id() != 2) {
            \Debugbar::disable();
        }
        return $next($request);
    }
}
