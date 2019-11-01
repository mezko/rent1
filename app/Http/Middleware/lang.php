<?php

namespace App\Http\Middleware;

use Closure;
use App;
class lang
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
        if ($request->lang=="en" or $request->lang==null) {
            App::setLocale('en');
        }else if($request->lang=="ar")  {
            App::setLocale('ar');
        }
        return $next($request);
    }
}
