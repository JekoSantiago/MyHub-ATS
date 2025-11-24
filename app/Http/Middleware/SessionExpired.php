<?php

namespace App\Http\Middleware;
use Closure;


class SessionExpired {

    public function handle($request, Closure $next)
    {

        if(env('UNDER_MAINTENANCE') == 1)
        {
            return  abort('503');
        }

        if (!$request->session()->has('Employee_ID')) {
            return  abort(501);
        }

        return $next($request);

    }


}
