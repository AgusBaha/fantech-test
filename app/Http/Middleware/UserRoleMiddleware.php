<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $allowedRoles)
    {
        $userRole = $request->user()->role;

        if (in_array($userRole, (array)$allowedRoles) || $userRole === 'superuser') {
            return $next($request);
        }

        abort(401); // Unauthorized
    }
}
