<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GioHang;
use App\Models\SanPham;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Hiển thị giỏ hàng của người dùng
    public function index()
    {
        $userId = Auth::id(); // hoặc session()->get('ngid')
        $cartItems = GioHang::with('sanPham')
            ->where('ngid', $userId)
            ->get();

        return view('cart.index', compact('cartItems'));
    }

    // Thêm sản phẩm vào giỏ
    public function add(Request $request, $spid)
    {
        $userId = Auth::id();

        $cartItem = GioHang::where('ngid', $userId)
            ->where('spid', $spid)
            ->first();

        if ($cartItem) {
            $cartItem->increment('soluong');
        } else {
            GioHang::create([
                'ngid' => $userId,
                'spid' => $spid,
                'soluong' => 1,
            ]);
        }

        return redirect('/cart')->with('success', 'Đã thêm sản phẩm vào giỏ!');
    }

    // Cập nhật số lượng
    public function update(Request $request, $ghid)
    {
        $cart = GioHang::findOrFail($ghid);
        $cart->update(['soluong' => $request->soluong]);
        return back()->with('success', 'Cập nhật giỏ hàng thành công');
    }

    // Xóa sản phẩm
    public function remove($ghid)
    {
        GioHang::destroy($ghid);
        return back()->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng');
    }
}

