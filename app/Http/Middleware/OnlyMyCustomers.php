<?php

namespace App\Http\Middleware;

use App\Http\Repos\CustomerRepo;
use Closure;

class OnlyMyCustomers
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
        //Is the current logged agency own this customer
        $agencyID = auth()->user()->profile->agency_id;

        $customerid = $request->segments()[2];
        if( (new CustomerRepo())->find($customerid)->flat[0]->agencies->contains($agencyID) ) {
            return $next($request);
        }else{
            return redirect('/agency/customer');
        }

    }
}
