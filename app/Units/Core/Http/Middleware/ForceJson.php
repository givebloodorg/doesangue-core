<?php

namespace GiveBlood\Units\Core\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class ForceJson
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $request->headers->set('Accept', 'application/json');

        return $next($request);
    }
}
