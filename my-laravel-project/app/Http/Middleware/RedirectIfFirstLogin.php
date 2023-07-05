<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfFirstLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
    if (auth()->check()) {
        // Kiểm tra xem người dùng có phải là lần đăng nhập đầu tiên hay không
        if (auth()->user()->first_login) {
            // Nếu là lần đăng nhập đầu tiên, chuyển hướng đến trang thay đổi mật khẩu
            return redirect()->route('passwordChange');
        }
    }

    return $next($request);
    }
}
