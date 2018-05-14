<?php

namespace App\Http\Middleware;
use Closure;
use Auth;

class RolVerifi
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
      if(Auth::check()){//
        if ($request->user()->type=="member") {
          return redirect('/inicio');
        }

      }
      if(!Auth::check()){
          return redirect('/');
      }
        return $next($request);
    }

}
