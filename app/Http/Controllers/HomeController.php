<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
{
    if (Auth::check()) {
        return "Đã đăng nhập: " . Auth::user()->mail;
    } else {
        return "Chưa đăng nhập";
    }
}
}
