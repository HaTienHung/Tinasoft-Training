<?php

namespace App\Http\Middleware;

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
    public function handle($request, Closure $next)
    {
        // Only admin have permission to access view Instructor list.
        $role_name = $request->route('role_name');
        // dd($request->user()->role_id);
        if ($role_name === 'instructor' && $request->user()->role_id !== 3) {
            abort(403, 'You do not have permission to access this route.');
        }
        if ($request->user()->role_id === 1 && $request->is('add')) {
            // Kiểm tra nếu người dùng có vai trò "user" và đang cố gắng truy cập /add
            abort(403, 'You do not have permission to access this route.');
        }
        return $next($request);
    }
}
