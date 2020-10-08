<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;

class SuperAdmin
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
        $role = Role::where('role', 'super_admin')->first();

        if(auth()->guard('admin')->check())
        {
            if (auth()->guard('admin')->user()->role_id === $role->id)
            {
                return $next($request);
            }else{
                return response()->json(['message' => 'Forbidden'], 403);
            }
        }

        return response()->json(['message' => 'Unauthenticated'], 401);
    }
}
