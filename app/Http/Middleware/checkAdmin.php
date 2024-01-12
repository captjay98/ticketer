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
            if ($user->is_staff && in_array($user->account_type, ["admin", "superuser"])) {
                return $next($request);
            }
            return abort(403, 'Unauthorized, ADMIN ONLY ROUTE.');


    }
}
