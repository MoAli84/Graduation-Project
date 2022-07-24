<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class entrycheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth('entry')->check()){
            return $next($request);

        }else{
            return redirect(url('entry/login'));
        }
    }
}
