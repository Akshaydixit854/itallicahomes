<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Session;

class Language {

    public function __construct(Application $app, Request $request) {
        $this->app = $app;
        $this->request = $request;

    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $site_language = Session::get('language');

    $urlArray = explode('.', parse_url($request->url(), PHP_URL_HOST));
   // dump($site_language,$urlArray);
    if(count($urlArray) < 3){
        return $next($request);
    }
    $subdomain = $urlArray[1];
   //dump($subdomain,array_key_exists($subdomain, config()->get('app.locales')));
    if(array_key_exists($subdomain, config()->get('app.locales'))){
        \App::setLocale($subdomain);
        setlocale(LC_TIME, $subdomain);
    //    dd(\URL::current());
      /*     $redirectTo =  '/locale/'.$subdomain;
       
      //dump($redirectTo);
                // Save any flashed data for redirect
                //app('session')->reflash();
                redirect(\URL::current(), 302, ['Vary' => 'Accept-Language']);*/
                $redirectTo = \URL::current().'/locale/'.$subdomain;
         // return redirect($redirectTo, 302, ['Vary' => 'Accept-Language']);
    }
    return $next($request);
    }

}
