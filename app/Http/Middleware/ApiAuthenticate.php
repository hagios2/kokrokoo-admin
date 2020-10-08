<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;

class ApiAuthenticate
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

        if(auth()->guard('admin')->check())
        {
            return $next($request);
        }

        return response()->json(['message' => 'Unauthenticated'], 401);
    }
}
