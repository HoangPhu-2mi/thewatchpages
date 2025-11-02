@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Giỏ hàng của bạn</h2>

    @if($cartItems->isEmpty())
        <p>Giỏ hàng đang trống.</p>
    @else
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Tổng</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                    <tr>
                        <td><img src="{{ asset('storage/'.$item->sanPham->hinhanh) }}" width="70"></td>
                        <td>{{ $item->sanPham->ten }}</td>
                        <td>
                            <form action="{{ route('cart.update', $item->ghid) }}" method="POST" class="d-flex">
                                @csrf
                                <input type="number" name="soluong" min="1" value="{{ $item->soluong }}" class="form-control w-50 me-2">
                                <button class="btn btn-sm btn-primary">Cập nhật</button>
                            </form>
                        </td>
                        <td>{{ number_format($item->sanPham->gia) }}₫</td>
                        <td>{{ number_format($item->sanPham->gia * $item->soluong) }}₫</td>
                        <td>
                            <a href="{{ route('cart.remove', $item->ghid) }}" class="btn btn-sm btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
