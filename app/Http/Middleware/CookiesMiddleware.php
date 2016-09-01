<?php

namespace App\Http\Middleware;

use Closure;

class CookiesMiddleware
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
        $response = $next($request);

        session()->put('acepto_cookies', TRUE);

        return $response;
        return $next($request);
    }
}
