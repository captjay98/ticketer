<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkStaff
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        if($user->is_staff === "true" && $user->account_type === 'staff' || 'admin' || 'superuser') {
            return $next($request);
        } else {
            return  abort(403, 'unauthorized');
        }
    }
}
