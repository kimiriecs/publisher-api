<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasRoleOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (! $request->user()->hasRole($role)) {
            
            return back()->with('messege', 'you do not have permission to perform this operation');
        }
        return $next($request);
    }
}
