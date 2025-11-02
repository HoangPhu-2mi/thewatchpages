@extends('layouts.app')

@section('title', 'Shop Watches')

@section('content')
<div class="container-fluid bg-white py-5">
    <h1 class="text-center mb-5 fw-bold text-uppercase">Shop Watches</h1>

    {{-- Bộ lọc --}}
    
    <form method="GET" action="{{ route('products.index') }}" class="row g-2 mb-4">

        {{-- Thương hiệu --}}
        <div class="col-md-3">
            <select name="brand" class="form-select">
                @if(request()->filled('brand'))
                    <option value="">Tất cả thương hiệu</option>
                @else
                    <option value="">Lọc theo thương hiệu</option>
                @endif
                @foreach($brands as $brand)
                    <option value="{{ $brand }}" {{ request('brand') == $brand ? 'selected' : '' }}>
                        {{ $brand }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Dòng sản phẩm --}}
        <div class="col-md-3">
            <select name="dong" class="form-select">
                @if(request()->filled('dong'))
                    <option value="">Tất cả dòng sản phẩm</option>
                @else
                    <option value="">Lọc theo dòng sản phẩm</option>
                @endif
                @foreach($dongs as $dong)
                    <option value="{{ $dong }}" {{ request('dong') == $dong ? 'selected' : '' }}>
                        {{ $dong }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Chất liệu --}}
        <div class="col-md-3">
            <select name="chatlieu" class="form-select">
                @if(request()->filled('chatlieu'))
                    <option value="">Tất cả chất liệu</option>
                @else
                    <option value="">Lọc theo chất liệu</option>
                @endif
                @foreach($chatlieus as $id => $chatlieu)
                    <option value="{{ $id }}" {{ request('chatlieu') == $id ? 'selected' : '' }}>
                        {{ $chatlieu }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Màu --}}
        <div class="col-md-3">
            <select name="mau" class="form-select">
                @if(request()->filled('mau'))
                    <option value="">Tất cả màu sắc</option>
                @else
                    <option value="">Lọc theo màu sắc</option>
                @endif
                @foreach($maus as $id => $mau)
                    <option value="{{ $id }}" {{ request('mau') == $id ? 'selected' : '' }}>
                        {{ $mau }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Nút hành động --}}
        <div class="col-md-12 text-center mt-3">
            <button type="submit" class="btn btn-dark px-4">Lọc</button>

            @if(request()->anyFilled(['brand', 'dong', 'chatlieu', 'mau']))
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary px-4 ms-2">Reset</a>
            @endif
        </div>
    </form>



    {{-- Danh sách sản phẩm --}}
    @if (!empty($search))
        @if ($products->isEmpty())
            <div class="text-center py-5">
                <p class="text-muted fs-5">
                    Không tìm thấy sản phẩm nào phù hợp với từ khóa 
                    "<strong>{{ $search }}</strong>".
                </p>
            </div>
        @else
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4 products-container">
                @foreach ($products as $product)
                    <div class="col">
                        <div class="card border-0 h-100 text-center position-relative">
                            <button class="btn fav-btn position-absolute top-0 end-0 m-2 p-0 border-0 bg-transparent" data-id="{{ $product->spid }}">
                                <i class="bi bi-heart"></i>
                            </button>
                            <a href="{{ route('products.show', ['dspid' => $product->dspid, 'spid' =>  $product->first_spid]) }}">
                                <img src="{{ asset($product->image ?? 'img/no-image.png') }}" 
                                    class="card-img-top p-3" 
                                    style="height: 230px; object-fit: contain;">
                            </a>
                            <div class="card-body">
                                <h6 class="fw-bold text-uppercase mb-1">{{ $product->brand }}</h6>
                                <p class="text-muted mb-1">{{ $product->Ten_SP }}</p>
                                <p class="fw-bold">${{ number_format($product->gia, 0) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @else
        @if ($products->isEmpty())
            <div class="text-center py-5">
                <p class="text-muted fs-5">Không có sản phẩm nào được hiển thị.</p>
            </div>
        @else
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4 products-container">
                @foreach ($products as $product)
                    <div class="col">
                        <div class="card border-0 h-100 text-center position-relative">
                            <button class="btn fav-btn position-absolute top-0 end-0 m-2 p-0 border-0 bg-transparent" data-id="{{ $product->spid }}">
                                <i class="bi bi-heart"></i>
                            </button>
                            <a href="{{ route('products.show', ['dspid' => $product->dspid, 'spid' =>  $product->first_spid]) }}">
                                <img src="{{ asset($product->image ?? 'img/no-image.png') }}" 
                                    class="card-img-top p-3" 
                                    style="height: 230px; object-fit: contain;">
                            </a>
                            <div class="card-body">
                                <h6 class="fw-bold text-uppercase mb-1">{{ $product->brand }}</h6>
                                <p class="text-muted mb-1">{{ $product->Ten_SP }}</p>
                                <p class="fw-bold">${{ number_format($product->gia, 0) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @endif


    {{-- Phân trang --}}
    <div class="d-flex justify-content-center mt-4">
        @if ($products->lastPage() > 1)
            <ul class="pagination custom-pagination">
                {{-- Prev --}}
                <li class="page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $products->previousPageUrl() ?? '#' }}">Pre</a>
                </li>

                {{-- Số trang --}}
                @for ($i = 1; $i <= $products->lastPage(); $i++)
                    <li class="page-item {{ $i == $products->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                {{-- Next --}}
                <li class="page-item {{ !$products->hasMorePages() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $products->nextPageUrl() ?? '#' }}">Next</a>
                </li>
            </ul>
        @endif
    </div>
</div>

{{-- Bootstrap Icons --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

{{-- JS --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Xử lý tim yêu thích
        const favorites = JSON.parse(localStorage.getItem('favorites') || '[]');
        favorites.forEach(id => document.querySelector(`[data-id='${id}'] i`)?.classList.add('text-danger', 'bi-heart-fill'));

        document.querySelectorAll('.fav-btn').forEach(btn => {
            btn.addEventListener('click', e => {
                e.preventDefault();
                const id = btn.dataset.id;
                const icon = btn.querySelector('i');
                let favs = JSON.parse(localStorage.getItem('favorites') || '[]');

                if (favs.includes(id)) {
                    favs = favs.filter(f => f !== id);
                    icon.classList.remove('text-danger', 'bi-heart-fill');
                    icon.classList.add('bi-heart');
                } else {
                    favs.push(id);
                    icon.classList.add('text-danger', 'bi-heart-fill');
                    icon.classList.remove('bi-heart');
                }
                localStorage.setItem('favorites', JSON.stringify(favs));
            });
        });

        // Hiệu ứng phân trang
        const container = document.querySelector('.products-container');
        if (container) container.style.transition = "opacity 0.4s ease";

        document.querySelectorAll('.pagination a').forEach(link => {
            link.addEventListener('click', e => {
                e.preventDefault();
                const url = e.target.href;
                container.style.opacity = 0;
                setTimeout(() => window.location.href = url, 300);
            });
        });
    });


    document.addEventListener("DOMContentLoaded", () => {
        // Lấy vị trí cuộn cũ
        const scrollPos = localStorage.getItem("scrollPos");
        if (scrollPos) {
            // Dùng setTimeout 0 để đảm bảo mọi element đã render
            setTimeout(() => {
                window.scrollTo({ top: parseInt(scrollPos), behavior: 'auto' });
                localStorage.removeItem("scrollPos");
            }, 0);
        }

        // Lưu vị trí khi click phân trang
        document.querySelectorAll(".pagination a").forEach(link => {
            link.addEventListener("click", () => {
                localStorage.setItem("scrollPos", window.scrollY);
            });
        });
    });
    const container = document.querySelector(".products-container");
    const product = container.querySelector(".product"); // mỗi sản phẩm
    
    if (product) {
        const productHeight = product.offsetHeight;
        container.style.minHeight = `${productHeight * 2}px`;
    }

    const select = document.getElementById('brand-select');


</script>

<style>
body {
    background-color: #fff !important;
}

.container {
    background-color: #fff;
}


/* Card sản phẩm gọn gàng, nền trắng tinh */
.card {
    background-color: #fff;
    border-radius: 12px;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.card:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 14px rgba(0, 0, 0, 0.08);
}

/* Ẩn thanh cuộn ngang */
.products-container {
    overflow-x: hidden;
}


.custom-pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 4px;
    list-style: none;
    padding: 0;
    margin: 15px 0;
}

.custom-pagination .page-item {
    display: inline-block;
}

.custom-pagination .page-link {
    border: 1px solid #dcdcdc;
    border-radius: 4px;
    color: #333;
    background: #fff;
    padding: 4px 10px;
    font-size: 13px;
    font-weight: 400;
    text-decoration: none;
    transition: background-color 0.2s ease, color 0.2s ease;
}

/* Hover */
.custom-pagination .page-link:hover {
    background: #f0f0f0;
    color: #333;
}

/* Trang đang active */
.custom-pagination .page-item.active .page-link {
    background: #333;
    color: #fff;
    border-color: #ccc;
    font-weight: 500;
}

/* Disabled */
.custom-pagination .page-item.disabled .page-link {
    color: #aaa;
    border-color: #eee;
    background: #fafafa;
    cursor: not-allowed;
}

/* Prev / Next */
.custom-pagination .page-item:first-child .page-link,
.custom-pagination .page-item:last-child .page-link {
    font-weight: 500;
}


</style>


@endsection
