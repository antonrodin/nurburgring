<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Request;


class RedirectToLocale
{
    /**
     * Handle an incoming request
     * Check first segment of route, if not "current locale" redirect to "current locale" with same url structure
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $current_locale = App::getLocale();
        if (Request::segment(1) != $current_locale) {
            $route = session()->get('last_route');
            $array_route = explode("/", $route);
            $array_route[0] = $current_locale;
            $redirect_route = implode("/", $array_route);
            return redirect($redirect_route);
        }
        return $next($request);
    }
}
