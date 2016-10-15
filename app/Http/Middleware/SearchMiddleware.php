<?php

namespace App\Http\Middleware;

use Closure;

class SearchMiddleware
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
        $query = $request->has('query');
        if (!$query)
        {
            return redirect('/');
        }

        return $next($request);
    }
}
