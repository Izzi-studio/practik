<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App;
class LangMiddleware
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
        $url_array = explode('.', parse_url($request->url(), PHP_URL_HOST));
        $subdomain = array_shift($url_array);

        $languages = ['en','fr'];

        if (in_array($subdomain, $languages)) {
            App::setLocale($subdomain);
        }

        return $next($request);
    }
}
