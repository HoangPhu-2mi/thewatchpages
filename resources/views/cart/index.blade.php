@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-6">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Giỏ hàng của bạn</h2>

        @if($cartItems->isEmpty())
            <p>Giỏ hàng trống.</p>
        @else
            <div class="overflow-x-auto rounded-lg shadow">
                <table class="w-full text-sm text-left text-gray-700 border border-gray-200">
                    <!-- <th class="px-4 py-3 text-center">
                        <input type="checkbox" id="checkAll" class="w-4 h-4 text-black rounded">
                        
                    </th> -->
                    <tbody>
                        @foreach($cartItems as $item)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="px-4 py-3">
                                    <input type="checkbox" name="selected[]" value="{{ $item->ghid }}"
                                        data-total="{{ $item->sanPham->gia * $item->soluong }}"
                                        class="item-check w-4 h-4 text-black rounded">
                                </td>

                                <td class="px-4 py-3">
                                    @php $hinh = $item->sanPham->hinhAnh->first(); @endphp
                                    <img src="{{ $hinh ? asset('storage/' . $hinh->vitri) : asset('uploads/noimage.jpg') }}"
                                        class="w-16 h-16 object-cover rounded-md mx-auto">
                                </td>

                                <td class="px-4 py-3">{{ $item->sanPham->Ten_SP }}</td>

                                <td class="px-4 py-3">
                                    <form action="{{ route('cart.update', $item->ghid) }}" method="POST"
                                        class="flex items-center space-x-2">
                                        @csrf
                                        <input type="number" name="soluong" value="{{ $item->soluong }}" min="1"
                                            class="w-20 border border-gray-300 rounded-lg px-2 py-1">
                                        <button type="submit" class="bg-black text-white px-3 py-2 rounded-lg text-xs">Cập
                                            nhật</button>
                                    </form>
                                </td>

                                <td class="px-4 py-3">{{ number_format($item->sanPham->gia) }}₫</td>
                                <td class="px-4 py-3">{{ number_format($item->sanPham->gia * $item->soluong) }}₫</td>

                                <td class="px-4 py-3 text-center">
                                    <a href="{{ route('cart.remove', $item->ghid) }}"
                                        class="bg-black text-white px-3 py-2 rounded-lg text-xs">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Form checkout nằm riêng --}}
            <form action="{{ route('cart.checkout') }}" method="POST" class="mt-6">
                @csrf
                <div class="flex justify-between items-center">
                    <h5 class="text-lg font-semibold">Tổng tiền: <span id="total-price">0</span>₫</h5>
                    <button type="submit" class="bg-black text-white px-6 py-3 rounded-lg">Thanh toán</button>
                </div>
            </form>
        @endif

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
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
<style>
    td img {
        width: 60px !important;
        height: 60px !important;
        object-fit: cover;
    }
</style>