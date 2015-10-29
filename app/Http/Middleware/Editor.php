<?php

namespace Blog\Http\Middleware;

use Blog\Http\Requests\Request;
use Blog\Blog;
use Closure;
use Auth;

class Editor
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
        if(Auth::user()->level==1)
            $blog = Blog::withTrashed()->findOrFail($request->route('blog'));
        else
            $blog = Blog::findOrFail($request->route('blog'));
        if(Auth::user()->level==1||Auth::id()==$blog->user_id)
            return $next($request);
        else
            return view('errors.401');
    }
}
