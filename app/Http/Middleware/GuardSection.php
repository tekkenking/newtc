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
        if(($url = $this->_prepareUrlSection($request)) !== $section){
            return redirect('/'.$url);
        }

        return $next($request);
    }

    private function _prepareUrlSection($request)
    {
        $prefix = $request->user()->profile_type;

        //If prefix is uroot
        return ($prefix == uroot_str()) ? tc_str() : $prefix;
    }
}
