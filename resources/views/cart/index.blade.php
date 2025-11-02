@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <h2 class="text-2xl font-semibold mb-6 text-gray-800">Giỏ hàng của bạn</h2>

    @if($cartItems->isEmpty())
        <p class="text-gray-600">Giỏ hàng đang trống.</p>
    @else
        <form action="{{ route('cart.checkout') }}" method="POST" id="checkout-form">
            @csrf

            <div class="overflow-x-auto rounded-lg shadow">
                <table class="w-full text-sm text-left text-gray-700 border border-gray-200">
                    <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                        <tr>
                            <th class="px-4 py-3 text-center">
                                <input type="checkbox" id="checkAll" class="w-4 h-4 text-black rounded">
                            </th>
                            <th class="px-4 py-3">Hình ảnh</th>
                            <th class="px-4 py-3">Tên sản phẩm</th>
                            <th class="px-4 py-3">Số lượng</th>
                            <th class="px-4 py-3">Giá</th>
                            <th class="px-4 py-3">Tổng</th>
                            <th class="px-4 py-3 text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartItems as $item)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="px-4 py-3 text-center">
                                    <input type="checkbox" name="selected[]" value="{{ $item->ghid }}"
                                        data-total="{{ $item->sanPham->gia * $item->soluong }}"
                                        class="item-check w-4 h-4 text-black rounded">
                                </td>
                                <td class="px-4 py-3">
                                    <img src="{{ asset('storage/'.$item->sanPham->hinhanh) }}"
                                         class="w-16 h-16 object-cover rounded-md border">
                                </td>
                                <td class="px-4 py-3 font-medium text-gray-800">
                                    {{ $item->sanPham->ten }}
                                </td>
                                <td class="px-4 py-3">
                                    <form action="{{ route('cart.update', $item->ghid) }}" method="POST"
                                          class="flex items-center space-x-2">
                                        @csrf
                                        <input type="number" name="soluong" min="1"
                                               value="{{ $item->soluong }}"
                                               class="w-20 border border-gray-300 rounded-lg px-2 py-1 focus:ring-2 focus:ring-black focus:outline-none">
                                        <button type="submit"
                                                class="bg-black hover:bg-gray-800 text-white text-xs font-semibold px-3 py-2 rounded-lg transition">
                                            Cập nhật
                                        </button>
                                    </form>
                                </td>
                                <td class="px-4 py-3">{{ number_format($item->sanPham->gia) }}₫</td>
                                <td class="px-4 py-3 font-semibold text-gray-800">
                                    {{ number_format($item->sanPham->gia * $item->soluong) }}₫
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <a href="{{ route('cart.remove', $item->ghid) }}"
                                       class="bg-black hover:bg-gray-800 text-white px-3 py-2 rounded-lg text-xs font-semibold transition">
                                        Xóa
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="flex flex-col sm:flex-row justify-between items-center mt-10 gap-4">
                <h5 class="text-lg font-semibold text-gray-800">
                    Tổng tiền: <span id="total-price" class="text-black font-bold">0</span>₫
                </h5>
                <button type="submit"
                        class="bg-black hover:bg-gray-800 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition">
                    Thanh toán
                </button>
            </div>
        </form>
    @endif
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const checkAll = document.getElementById('checkAll');
    const checkboxes = document.querySelectorAll('.item-check');
    const totalPriceEl = document.getElementById('total-price');

    function updateTotal() {
        let total = 0;
        checkboxes.forEach(chk => {
            if (chk.checked) total += parseFloat(chk.dataset.total);
        });
        totalPriceEl.textContent = total.toLocaleString();
    }

    checkboxes.forEach(chk => chk.addEventListener('change', updateTotal));
    checkAll.addEventListener('change', () => {
        checkboxes.forEach(chk => chk.checked = checkAll.checked);
        updateTotal();
    });
});
</script>
@endsection
