<?php

namespace Siropa\Http\Middleware;

use Closure;

class CheckRole
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

        $roles = array_slice(func_get_args(), 2);
        //$roles=func_get_args();
        //$roles=array_slice($roles, 2);
        //dd($roles);
        //dd($roles);
        if (auth()->user()->hasRoles($roles)){

          return $next($request);
        }
        return redirect('/');

    }
}
