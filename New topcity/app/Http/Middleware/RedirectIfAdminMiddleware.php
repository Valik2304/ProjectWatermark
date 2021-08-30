<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfAdminMiddleware
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
        $admin = \Auth::user()->hasRole('admin') || \Auth::user()->hasRole('adminweb');
        if(!\Auth::check() || !$admin) {
            return abort(404);
        }
        return $next($request);
    }
}
