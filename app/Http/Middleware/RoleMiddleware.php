<?php

namespace App\Http\Middleware;

use App\Models\UserRoles;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        $userRole = UserRoles::where("userId", "=", $user->id)->first();

        if ($userRole->roleName !== "admin") {
            return redirect()->route("/")->with("error", "Error: you are not authorized in this route");
        }

        return $next($request);

    }
}
