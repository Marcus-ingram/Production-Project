<?php

namespace App\Http\Middleware;
use App\User;
use Closure;


class MustBeSubscribed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param 
     * @return mixed
     */
    public function handle($request, Closure $next, $plan = null)
    {
        $user = $request->user();
        
         if ($user && $user->subscribed($plan)){
        return $next($request);
    }
       
    return redirect('/');

    }
}
