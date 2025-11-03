<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonHang;
use App\Models\ChiTietDonHang;

class CheckoutController extends Controller
{
    // Hiển thị trang thanh toán
    public function index(Request $request)
    {
        // Dữ liệu demo giỏ hàng (có thể lấy từ session)
        $cart = $request->session()->get('cart', [
            [
                'id' => 1,
                'name' => '1815 Tourbillon',
                'price' => 1090.00,
                'qty' => 1,
                'image' => '',
                'old_price' => 1380.00
            ]
        ]);

        $subtotal = array_sum(array_map(fn($i) => $i['price'] * $i['qty'], $cart));
        $shipping = 30.00;
        $total = $subtotal + $shipping;

        return view('checkouts.information', compact('cart', 'subtotal', 'shipping', 'total'));
    }

    // Lưu đơn hàng vào database
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'country' => 'required',
            'city' => 'required',
            'phone' => 'required',
        ]);

        // Lưu đơn hàng
        $donhang = DonHang::create([
            'trangthai' => 'Pending',
            'tongtien' => $request->input('total'),
            'Phuong_thuc_TT' => $request->input('payment_method', 'Credit Card'),
            'Phi_van_chuyen' => 30.00,
            'note' => $request->input('note'),
        ]);

        // Lưu chi tiết đơn hàng
        $cart = session('cart', []);
        foreach ($cart as $item) {
            ChiTietDonHang::create([
                'Don_gia' => $item['price'],
                'soluong' => $item['qty'],
                'spid' => $item['id'],
                'dhid' => $donhang->dhid,
            ]);
        }

        // Xoá giỏ hàng sau khi đặt
        $request->session()->forget('cart');

        return redirect()->route('checkout.index')->with('success', 'Order placed successfully!');
    }
}
