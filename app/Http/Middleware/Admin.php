<?php

namespace App\Http\Middleware;

use Closure;
use App\Admin as Admins;

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
        if(Admins::where('user_id', \Auth::user()->id)->first())
        {
            return $next($request);
        }
        else
        {
            abort(404);
        }
    }
}
