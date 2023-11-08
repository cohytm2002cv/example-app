<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Đăng nhập thành công, chuyển hướng hoặc thực hiện hành động sau đăng nhập
            return redirect()->intended('/dashboard');
        }

        // Đăng nhập thất bại, quay lại trang đăng nhập với thông báo lỗi
        return back()->withErrors(['email' => 'Email hoặc mật khẩu không đúng.']);
    }

}
