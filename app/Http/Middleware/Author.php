<?php

namespace Blog\Http\Middleware;

use Auth;
use Closure;

class Author
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
        if(Auth::user()->level<3)
            return $next($request);
        else
            return view('errors.401');
    }
}
