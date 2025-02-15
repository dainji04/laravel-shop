<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index(): View
    {
        return view('login');
    }
    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt([
            'email' => $email,
            'password' => $password, // Không dùng bcrypt()
        ], $request->input('remember'))) {
            $request->session()->regenerate();

            $request->session()->put('success', 'Đăng nhập thành công');

            return redirect('/');
        }

        return redirect('/login')->withErrors([
            'email' => 'Email hoặc mật khẩu không đúng',
        ]);
    }
}
