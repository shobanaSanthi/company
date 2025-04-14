<?php

namespace App\Http\Middleware;

use Closure;

class CheckEmployee
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
        if (!session()->has('User')){   
            return redirect("/");
        }elseif(session()->get('User')!="Employee"){
            return redirect("error_401");
        }
            return $next($request);
        
    }
}
