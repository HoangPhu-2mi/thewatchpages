<header class=" bg-white shadow-sm">  <!-- sticky-top để cho header dính vào  -->
    <style>
        input.form-control.rounded-0.border-dark{
            border-right: 0px;
        }
        .timkiem:focus {
            outline: none !important;
            box-shadow: none !important;
        }
        .iconheader{
            margin: 0px !important;
            padding: 0px !important;
        }
    </style>
    <div class="border-bottom border-gray-200">
        <div class="container d-flex align-items-center justify-content-between py-3">

            <button class="navbar-toggler d-lg-none me-3" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <a class="navbar-brand fw-bold fs-5 text-dark me-auto" href="{{ url('/') }}" aria-label="Trang chủ The Watch Pages" style="white-space: nowrap;">
                <svg height="29px" width="223px" aria-hidden="true" class="w-44 fill-current sm:w-48 2xl:w-56" xmlns="http://www.w3.org/2000/svg" id="Layer_1" viewBox="0 0 600 77.8" version="1.1">
              <path class="st0" d="M64.3 32.6h-6L46.3 59l-7.8-21.9-7.8 23.3-12-28.7h-5.5c.5-1.8 1.2-3.6 2.1-5.2h6.9l8 19.1 8.2-24.4L47 45.1l8-17.7h7.4c.8 1.6 1.4 3.4 1.9 5.2z" id="path12" fill-opacity="1"></path>
              <path class="st0" d="M77.2 37.8l-5.4-.4 3.4-11.6c.1-.3-.2-.6-.5-.5l-5.2 1.4-.5-12.1c0-.3-.4-.5-.6-.3l-4.5 3L59.3 6c-.1-.3-.5-.3-.7-.1l-3.3 4.3L47.5 1c-.2-.2-.6-.2-.7.1l-1.6 5-9.8-6c-.3-.2-.6 0-.6.3v5.4L22.9 3.2c-.3-.1-.5.2-.5.5l1.8 5.1-12.1 1.4c-.3 0-.5.4-.3.6l3.3 4.3-10.8 5.3c-.3.1-.3.5 0 .7l4.5 3-8.6 8.5c-.2.2-.1.6.2.7l5.2 1.3L.2 45.4c-.2.3 0 .6.3.6l5.4-.4-1.6 12c0 .3.3.5.6.4l5-2.2 2.4 11.9c.1.3.4.4.7.2l4-3.7 6.2 10.5c.2.3.5.2.7 0l2.6-4.8 9.2 7.9c.2.2.6.1.7-.2l.9-5.4 11.3 4.4c.3.1.6-.1.5-.4L48 70.7l12.1.5c.3 0 .5-.3.3-.6l-2.6-4.8 11.6-3.4c.3-.1.4-.5.2-.7l-4-3.6 9.9-7.1c.2-.2.2-.6-.1-.7l-5-2.1 7-9.9c.2-.2.1-.5-.2-.5zM38.6 65.3c-14.6 0-26.4-11.8-26.4-26.4 0-2.5.3-4.9 1-7.2.5-1.8 1.2-3.6 2.1-5.2 4.4-8.3 13.2-14 23.3-14 10.5 0 19.5 6.1 23.8 14.9.8 1.7 1.4 3.4 1.9 5.2.5 2 .8 4.1.8 6.3-.1 14.5-11.9 26.4-26.5 26.4zm75-7.9h-6.3V27.5H96v-5.8h28.9v5.8h-11.3v29.9zm24.2-15v15h-6.3V21.7h6.3v14.8h17V21.7h6.3v35.7h-6.3v-15h-17zm58.9-15.1h-20.2v9.3h17.9v5.6h-17.9v9.6h20.4v5.6h-26.7V21.7h26.4v5.6zm44.3-5.7h5.3l8.8 26.5 8.5-26.4h6.6l-12.4 35.9h-5.4L243.5 32l-8.8 25.6h-5.4l-12.4-35.9h6.8l8.5 26.4 8.8-26.5zm65.1 35.8h-6.6l-3.6-8.6H279l-3.7 8.6h-6.4l15.7-35.9h5.8l15.7 35.9zM287.4 29l-6.1 14.3h12.3L287.4 29zm35.3 28.4h-6.3V27.5H305v-5.8h29v5.8h-11.3v29.9zm32.5.6c-10.4 0-18.1-8.1-18.1-18.4 0-10.2 7.6-18.5 18.4-18.5 6.6 0 10.5 2.3 14 5.6l-4 4.6c-2.9-2.6-5.9-4.4-10-4.4-6.8 0-11.8 5.6-11.8 12.6s4.9 12.7 11.8 12.7c4.4 0 7.2-1.8 10.2-4.6l4 4.1c-3.7 3.8-7.8 6.3-14.5 6.3zm27.3-15.6v15h-6.3V21.7h6.3v14.8h17V21.7h6.3v35.7h-6.3v-15h-17zm61.1 3.5h-7.1v11.5h-6.3V21.7h14.1c8.3 0 13.5 4.7 13.5 12 .1 8-6.4 12.2-14.2 12.2zm.2-18.5h-7.3v12.8h7.3c4.7 0 7.7-2.6 7.7-6.4 0-4.2-3-6.4-7.7-6.4zm51 30h-6.6l-3.6-8.6h-16.9l-3.7 8.6h-6.4l15.7-35.9h5.8l15.7 35.9zM476.1 29L470 43.2h12.3L476.1 29zm39.6 29c-11.2 0-18.5-7.9-18.5-18.4 0-10 7.6-18.5 18.4-18.5 6.2 0 10 1.7 13.7 4.8l-4 4.7c-2.8-2.3-5.4-3.8-10-3.8-6.6 0-11.6 5.7-11.6 12.6 0 7.4 4.8 12.8 12.1 12.8 3.4 0 6.4-1.1 8.6-2.7v-6.7h-9.1v-5.5h15.2v15C527 55.4 522 58 515.7 58zm49.4-30.7H545v9.3h17.9v5.6H545v9.6h20.4v5.6h-26.7V21.7h26.4v5.6zm21.5 9.4c7.5 1.8 11.5 4.5 11.5 10.5 0 6.7-5.2 10.7-12.7 10.7-5.4 0-10.6-1.9-14.9-5.7l3.8-4.5c3.4 3 6.8 4.6 11.3 4.6 3.9 0 6.3-1.8 6.3-4.5 0-2.6-1.4-4-8-5.5-7.6-1.8-11.9-4.1-11.9-10.7 0-6.2 5.1-10.4 12.2-10.4 5.2 0 9.3 1.6 12.9 4.5l-3.4 4.7c-3.2-2.4-6.4-3.7-9.7-3.7-3.7 0-5.8 1.9-5.8 4.3-.1 2.9 1.6 4.1 8.4 5.7z" id="path14" fill-opacity="1"></path>
            </svg>
            </a>

            <div class="d-none d-lg-flex flex-grow-1 justify-content-center px-4">
                <form action="{{ route('products.search') }}" method="GET" class="d-flex w-100" style="max-width: 500px; position: relative;">
                    <input id="search-input" name="search" class="form-control timkiem rounded-0 border-dark" type="search" 
                        placeholder="Search amongst 26,451 watches, references, brands" aria-label="Search">
                    <button class="btn btn-outline-dark rounded-0 border-start-0" type="submit" aria-label="Tìm kiếm">
                        <svg width="18px" height="18px" class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>

                    <div id="search-suggest" style="display: none;"></div>
                </form>
            </div>
            
            <ul class="navbar-nav flex-row ms-auto align-items-center">
                
                <li class="nav-item ">
                    <a class="nav-link p-0 iconheader" href="{{ url('/account') }}" aria-label="Tài khoản của tôi">
                       <svg width="24px" height="24px" aria-hidden="true" class="w-5 h-5 sm:h-6 sm:w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"></path>
                        </svg>
                    </a>
                </li>
                
                <li class="nav-item ">
                    <a class="nav-link p-0 iconheader"  href="{{ url('/my-favorites') }}" aria-label="Mục yêu thích">
                        <svg width="24px" height="24px"  aria-hidden="true" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"></path>
                        </svg>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link p-0 iconheader" href="{{ url('/cart') }}" aria-label="Giỏ hàng">
                        <svg width="24px" height="24px" aria-hidden="true" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"></path>
                    </svg>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light p-0">
        <div class="container">
            <div class="collapse navbar-collapse w-100 justify-content-center" id="mainMenu">
                <ul class="navbar-nav text-uppercase fw-semibold" style="letter-spacing: 0.1em;">
                    <li class="nav-item"><a class="nav-link px-3 py-2 border-bottom border-white hover-border-dark" href="{{ url('/finder') }}">WATCH FINDER</a></li>
                    <li class="nav-item"><a class="nav-link px-3 py-2 border-bottom border-white hover-border-dark" href="{{  route('products.index')}}">SHOP</a></li>
                    <li class="nav-item"><a class="nav-link px-3 py-2 border-bottom border-white hover-border-dark" href="{{ url('/brands') }}">BRANDS</a></li>
                    <li class="nav-item"><a class="nav-link px-3 py-2 border-bottom border-white hover-border-dark" href="{{ url('/new-watches') }}">NEW WATCHES 2025</a></li>
                    <li class="nav-item"><a class="nav-link px-3 py-2 border-bottom border-white hover-border-dark" href="{{ url('/editorial') }}">EDITORIAL</a></li>
                    <li class="nav-item"><a class="nav-link px-3 py-2 border-bottom border-white hover-border-dark" href="{{ url('/guides') }}">WATCH GUIDES</a></li>
                </ul>
            </div>
            
            <!-- <form action="{{ route('products.search') }}" method="GET" class="d-flex w-100" style="max-width: 500px;">
                <input name="search" class="form-control timkiem rounded-0 border-dark" type="search" 
                    placeholder="Search amongst 26,451 watches, references, brands" aria-label="Search">
                <button class="btn btn-outline-dark rounded-0 border-start-0" type="submit" aria-label="Tìm kiếm">
                </button>
            </form> -->

            
        </div>
    </nav>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const input = document.getElementById('search-input');
    if (!input) return; 
    const suggestBox = document.getElementById('search-suggest');

    input.addEventListener('input', async function() {
        const query = this.value.trim();

        if (!query) {
            suggestBox.style.display = 'none';
            suggestBox.innerHTML = '';
            return;
        }

        const response = await fetch(`/products/search-suggest?q=${encodeURIComponent(query)}`);
        const data = await response.json();
        console.log(data);
        
        if (data.length === 0) {
            suggestBox.innerHTML = '<div class="p-2 text-muted">Không tìm thấy sản phẩm</div>';
        } else {
            suggestBox.innerHTML = data.map(p => `
                <a href="/products/${p.dspid}/${p.spid}" 
                    class="d-flex align-items-center p-2 text-dark text-decoration-none border-bottom"
                    style="gap: 10px;">
                    <img src="${p.image_url || '/images/no-image.png'}" 
                        alt="${p.Ten_SP}" 
                        width="50" height="50"
                        style="object-fit: cover; border-radius: 8px; border: 1px solid #eee;">
                    <div class="flex-grow-1">
                        <div class="fw-bold">${p.Ten_SP}</div>
                        <small class="text-muted">${p.brand}</small>
                    </div>
                </a>
            `).join('');

        }

        suggestBox.style.display = 'block';
    });

    // Ẩn khi click ra ngoài
    document.addEventListener('click', (e) => {
        if (!e.target.closest('#search-suggest') && e.target !== input) {
            suggestBox.style.display = 'none';
        }
    });
});
</script>
<style>
#search-suggest {
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    background: #fff;
    border: 1px solid #ddd;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    z-index: 1000;
    overflow-y: auto;
    max-height: 300px;
}
#search-suggest a:hover {
    background-color: #f8f9fa;
}

/* Mỗi item */
</style>
</header>
