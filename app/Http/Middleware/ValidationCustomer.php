<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class ValidationCustomer
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
        if(Auth::user()->customer_id == null) {
            return redirect('/validate-customer');
        }else{
            return $next($request);
        }
    }
}
