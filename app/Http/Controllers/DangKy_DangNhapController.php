<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NguoiDung;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Support\Facades\Password;

class DangKy_DangNhapController extends Controller
{
    /** ========== TRANG ĐĂNG KÝ ========== */
    public function showForm()
    {
        return view('auth.dangky');
    }

    public function register(Request $request)
    {
        $request->validate([
            'TaiKhoan' => 'required|string|max:50|unique:NguoiDung,TaiKhoan',
            'mail' => 'required|email|max:100|unique:NguoiDung,mail',
            'password' => 'required|min:6',
            'privacy' => 'accepted',
        ], [
            'TaiKhoan.required' => 'Vui lòng nhập tên tài khoản.',
            'TaiKhoan.unique' => 'Tên tài khoản đã tồn tại.',
            'mail.required' => 'Vui lòng nhập email.',
            'mail.email' => 'Email không hợp lệ.',
            'mail.unique' => 'Email này đã được sử dụng.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'privacy.accepted' => 'Bạn phải đồng ý với chính sách bảo mật.',
        ]);

        NguoiDung::create([
            'TaiKhoan' => $request->TaiKhoan,
            'mail' => $request->mail,
            'password' => Hash::make($request->password),
            'vtid' => 1,
        ]);

        return redirect()->route('login')->with('success', 'Tạo tài khoản thành công! Vui lòng đăng nhập.');
    }

    /** ========== TRANG ĐĂNG NHẬP ========== */
    public function showLoginForm()
    {
        return view('auth.dangnhap');
    }

    public function login(Request $request)
    {
        $request->validate([
            'mail' => 'required|email',
            'password' => 'required',
        ]);

    $credentials = [
        'mail' => $request->mail, // ⚠️ Dùng mail, không phải email
        'password' => $request->password,
    ];


    if (Auth::attempt($credentials, $request->remember)) {
        $request->session()->regenerate();
        return redirect()->intended('/')->with('success', 'Đăng nhập thành công!');
    }

    return back()->with('error', 'Email hoặc mật khẩu không chính xác.')->withInput();
    }


    /** ========== TRANG QUÊN MẬT KHẨU ========== */
    public function showForgotPasswordForm()
    {
        return view('auth.quenmatkhau');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email'], [
            'email.required' => 'Vui lòng nhập email của bạn.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
        ]);

        $status = Password::sendResetLink(['email' => $request->email]);

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['success' => 'Liên kết đặt lại mật khẩu đã được gửi đến email của bạn.'])
            : back()->withErrors(['email' => 'Không thể gửi email khôi phục.']);
    }

    /** ========== ĐĂNG XUẤT ========== */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('welcome')->with('success', 'Đã đăng xuất.');
    }
}
