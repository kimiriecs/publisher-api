<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class HasActiveSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $status)
    {
        if ($request->user()->hasSubscriptionStatus($status)) {

            return back(401)->with('messege', 'this operation is not available to you because you have an active subscription');
        }
        return $next($request);
    }
}