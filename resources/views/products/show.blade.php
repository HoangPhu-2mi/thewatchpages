@extends('layouts.app')

@section('content')
<div class="container-fluid bg-white py-5">
    <div class="row justify-content-center align-items-start">

        <!-- BÊN TRÁI: ẢNH PHỤ -->
        <div class="col-md-2 d-flex flex-column align-items-center">
            <div id="thumb-list" class="d-flex flex-column align-items-center" style="gap: 10px;">
                @foreach(array_slice($mainImages, 0, 4) as $thumb)
                    <img src="{{ $thumb }}" 
                         class="img-thumbnail thumb-item" 
                         style="width: 100px; height: 100px; object-fit: cover; cursor:pointer; border: 1px solid #ddd; transition: 0.3s;">
                @endforeach
            </div>
        </div>

        <!-- ẢNH CHÍNH -->
        <div class="col-md-5 text-center">
            <div class="d-flex justify-content-center align-items-center" 
                 style="background: white; height: 500px;">
                <img id="main-image" 
                     src="{{ $mainImages[0] ?? '' }}" 
                     class="img-fluid" 
                     style="max-width: 100%; max-height: 100%; object-fit: contain; padding: 10px;"
                     alt="Main Image">
            </div>
        </div>

        <!-- BÊN PHẢI: Thông tin sản phẩm -->
        <div class="col-md-5">
            <div class="card border-0 bg-white">
                <div class="card-body">
                    <h5 class="text-muted mb-1">Official Authorized Retailer</h5>
                    <h3 class="fw-bold">{{ $mainProduct->brand }}</h3>
                    <h4 class="mb-2">{{ $mainProduct->Ten_SP }}</h4>
                    <p class="text-secondary mb-2">Limited edition</p>
                    <p class="mb-2"><strong>Price:</strong> ${{ number_format($mainProduct->gia, 2) }}</p>
                    <p class="mb-3">{{ $mainProduct->mota }}</p>

                    <!-- Các sản phẩm khác cùng dòng -->
                    <div class="d-flex gap-2 mb-3 flex-wrap">
                        @foreach($products as $product)
                            @php $imgs = json_decode($product->images_json ?? '[]', true); @endphp
                            @if(count($imgs))
                                <a href="{{ route('products.show', ['dspid' => $product->dspid, 'spid' => $product->spid]) }}">
                                    <img src="{{ $imgs[0] }}" 
                                         class="img-thumbnail other-variant" 
                                         data-images='@json($imgs)'
                                         data-name="{{ $product->Ten_SP }}"
                                         style="width: 70px; height: 70px; cursor:pointer; border: 1px solid #ccc; transition: 0.3s;">
                                </a>
                            @endif
                        @endforeach
                    </div>

                    <button class="btn btn-dark w-100 mb-2">ADD TO BAG</button>
                    <button class="btn btn-outline-dark w-100">GET IN TOUCH</button>

                    <div class="mt-3 d-flex align-items-center text-success">
                        <i class="bi bi-truck me-2"></i> Ships in 1–2 weeks
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const mainImage = document.getElementById('main-image');
    const thumbs = document.querySelectorAll('.thumb-item');

    thumbs.forEach(img => {
        img.addEventListener('click', () => {
            mainImage.src = img.src;
            thumbs.forEach(t => t.style.opacity = '1');
            img.style.opacity = '0.6';
        });

        img.addEventListener('mouseenter', () => {
            img.style.border = '2px solid black';
        });

        img.addEventListener('mouseleave', () => {
            img.style.border = '1px solid #ddd';
        });
    });
});
document.addEventListener('DOMContentLoaded', () => {
    const mainImage = document.getElementById('main-image');
    const thumbs = document.querySelectorAll('.thumb-item');

    // Gán border mặc định cho ảnh đầu tiên (đang hiển thị)
    if (thumbs.length > 0) {
        thumbs[0].classList.add('active-thumb');
    }

    thumbs.forEach(img => {
        img.addEventListener('click', () => {
            mainImage.src = img.src;

            // Reset border cho tất cả thumbnail
            thumbs.forEach(t => t.classList.remove('active-thumb'));
            img.classList.add('active-thumb');
        });

        img.addEventListener('mouseenter', () => {
            if (!img.classList.contains('active-thumb')) {
                img.style.border = '2px solid #aaa';
            }
        });

        img.addEventListener('mouseleave', () => {
            if (!img.classList.contains('active-thumb')) {
                img.style.border = '1px solid #ddd';
            }
        });
    });
});

// --- Border cho ảnh biến thể (bên phải) ---
const variants = document.querySelectorAll('.other-variant');
if (variants.length > 0) {
    // Đánh dấu ảnh hiện tại (dựa theo URL hiện hành)
    const currentUrl = window.location.href;
    variants.forEach(v => {
        const link = v.closest('a').href;
        if (currentUrl === link) v.classList.add('active-variant');
    });

    // Khi hover, chỉ thêm viền nhẹ
    variants.forEach(v => {
        v.addEventListener('mouseenter', () => {
            if (!v.classList.contains('active-variant')) {
                v.style.border = '2px solid #aaa';
            }
        });
        v.addEventListener('mouseleave', () => {
            if (!v.classList.contains('active-variant')) {
                v.style.border = '1px solid #ddd';
            }
        });
    });
}


</script>

<style>
.other-variant.active-variant,
.thumb-item.active-thumb {
    border: 2px solid black !important;
    opacity: 0.8;
}

#main-image {
    border-radius: 16px; /* bo góc nhẹ, tùy chỉnh 8–16px */
    background-color: #fff; /* nền trắng tránh viền cứng nếu ảnh có nền khác */
    padding: 6px; /* tạo khoảng cách nhẹ giữa ảnh và nền trắng */
}
</style>

@endsection
