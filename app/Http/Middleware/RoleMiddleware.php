<?php

namespace App\Http\Middleware;

use App\Models\User;
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
        // dd($request->user()->role_id);
        if ($request->is('all/instructor') && $request->user()->role_id !== 3) {
            abort(403, 'You do not have permission to access this route.');
        }
        if ($request->user()->role_id === 1 && ($request->is('add/*') || $request->is('edit/*'))) {
            // Kiểm tra nếu người dùng có vai trò "user" và đang cố gắng truy cập /add
            abort(403, 'You do not have permission to access this route.');
        }
        //Prevent instructors from editing users with roles 'admin' or 'instructor'.
        if ($request->user()->role_id === 2 && $request->is('edit/*')) {
            // Lấy ID của người dùng đang cố gắng sửa
            $userIdToEdit = $request->segment(2); // Giả sử ID nằm ở segment thứ 2 trong URL

            // Lấy role_id của người dùng cần sửa
            $userToEditRole = User::find($userIdToEdit)->role_id;

            // Kiểm tra nếu role_id của người dùng đang cố gắng sửa là 2 hoặc 3
            if ($userToEditRole === 2 || $userToEditRole === 3) {
                abort(403, 'You do not have permission to edit this user.');
            }
        }
        return $next($request);
    }
}
