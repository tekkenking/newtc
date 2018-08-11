<?php

namespace App\Http\Middleware;

use Closure;

class GuardSection
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $section)
    {
        //dd($section);
        if(($url = $request->user()->profile_type) !== $section){
            return redirect('/'.$url);
        }

        return $next($request);
    }
}
