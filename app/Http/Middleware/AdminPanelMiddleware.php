<?php

namespace App\Http\Middleware;

use Closure;

class AdminPanelMiddleware
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
        // if(auth()->check() && auth()->user()->role === 'admin'){
        //     return redirect()->route('index');
        // }
       
        return $next($request);
    }
    
}
