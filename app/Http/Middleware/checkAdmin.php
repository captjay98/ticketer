<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        if ($user->is_admin  && in_array($user->account_type, ["admin", "superuser"])) {
            return $next($request);
        } else {
            return abort(403, 'Unauthorized, Only an Admin can Perform this action.');
        }
    }
}
