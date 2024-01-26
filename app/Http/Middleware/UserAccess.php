<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$allowedRoles)
    {
        $user = auth()->user();

        foreach ($allowedRoles as $role) {
            if ($user && $user->role === $role) {
                return $next($request);
            }
        }

        Log::warning('Access Denied:', ['user' => $user, 'required_roles' => $allowedRoles]);
        abort(403, trans('auth.access_denied'));
    }
}
