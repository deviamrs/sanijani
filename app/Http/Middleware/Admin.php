<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if(!Auth::user()->role_id){
            session()->flash('danger' , 'You do not have permissions to perform this action');
            return redirect()->back();
           } 
           else{
              return $next($request);
           }   
    }
}
