<?php

namespace App\Http\Middleware;

use Closure;
use Request;
use App;
use Session;
use Config;
use Redirect;

class SetLocaleMiddleware
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

        if (Session::has('forever_locale')) {

            //if user change the language, set forever locale
            App::setLocale(Session::get('forever_locale'));
            Session::put('current_locale', Session::get('forever_locale'));

        } else {

            //If user do not changed locale, we get it from Request first segment
            $locale = Request::segment(1);
            if ($locale == '') {
                $locale = App::getLocale();
            }

            //Check browser language and compare to our
            $browser_lang =  substr(Request::server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
            if (($locale != $browser_lang) AND in_array($browser_lang, Config::get('nurburgring.languages'))) {

                //Si no es igual al segmento y tenemos disponible ese idioma
                //Los establecemos en el idioma de la aplicacion
                //En este caso deberiamos hacer un redirect
                Session::put('current_locale', $browser_lang);
                App::setLocale($browser_lang);
            } else {

                //Si los idiomas coinciden con el navegador
                //Cogemos cualquiera de ellos
                Session::put('current_locale', $locale);
                App::setLocale($locale);
            }

        }

        return $next($request);
    }
}
