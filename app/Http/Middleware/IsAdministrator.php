<?php

namespace App\Http\Middleware;

use Closure;

class IsAdministrator
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
        // if role != administrator
        // do some actions
         
        if(auth()->check()){
            // user is logged in
            if(auth()->user()->role != \App\User::ADMINISTRATOR){
                // but user is not administrator
                abort(401, 'Unauthorized action.');
            }
        } else {
            // user is not logged in - guest
            abort(401, 'Unauthorized action.');
        }
        
         
        // case 1. logout with message
        
        // case 2. redirect to welcome route with message
        
        // case 3. abort, set http response status 401
        
        
        return $next($request);
    }
}
