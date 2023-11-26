<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserId
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Kiểm tra xem id của người dùng có phải là 1 hay không
        if ($user && $user->id == 1) {
            return $next($request);
        }

        // Nếu không phải người dùng có id là 1, bạn có thể xử lý tùy chọn khác ở đây, ví dụ: chuyển hướng hoặc trả về lỗi 403 Forbidden.
        session(['error' => 'Bạn không có quyền truy cập vào trang này.']);

        return redirect()->route('dashboard');

        // Hoặc bạn có thể thực hiện các xử lý khác tùy thuộc vào yêu cầu của bạn.

        // return $next($request);
    }
}
