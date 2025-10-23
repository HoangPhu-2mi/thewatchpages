@extends('layouts.app')

@section('title', 'The Watch Pages - Trang Chủ')

@section('content')

    <section class="hero-section">
        <div class="container-fluid p-0">
            <div class="row g-0 align-items-center" style="min-height: 500px;">
                
                <div class="col-12 col-md-6 bg-dark text-white d-flex align-items-center justify-content-center p-5 p-md-0" style="min-height: 500px;">
                    <div class="text-center text-md-end me-md-5">
                        <h1 class="display-5 fw-bold text-uppercase mb-4">
                            Explore The World's Largest Watch Finder
                        </h1>
                        <a href="{{ url('/finder') }}" class="btn btn-light btn-lg rounded-0 px-5 py-3 fw-bold text-uppercase">
                            Explore
                        </a>
                    </div>
                </div>
                
                <div class="col-12 col-md-6 bg-light d-flex flex-column align-items-center justify-content-center position-relative p-5">
                    
                    <img src="https://via.placeholder.com/300x400/000000/ffffff?text=WATCH+IMAGE" 
                         alt="Benrus Type 2 Mil Spec Watch" 
                         class="img-fluid hero-watch-image" 
                         style="max-width: 300px; z-index: 10;"
                    >
                    <small class="bg-dark text-white px-2 py-1 position-absolute" style="bottom: 100px; transform: translateX(-50%); left: 50%;">BENRUS Type 2 Mil Spec</small>

                    <div class="text-center ms-md-5 mt-5 mt-md-0">
                        <h2 class="h3 fw-bold text-uppercase mb-4">
                            Shop Our Selection of Handpicked Watches
                        </h2>
                        <a href="{{ url('/shop') }}" class="btn btn-dark btn-lg rounded-0 px-5 py-3 fw-bold text-uppercase">
                            Shop Watches
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="new-products py-5">
        <div class="container">
            <div class="row align-items-center mb-4">
                
                <div class="col-lg-3 mb-4 mb-lg-0">
                    <p class="text-muted fw-bold mb-1">123 WATCHES</p>
                    <h2 class="display-6 fw-bold mb-3">WHAT'S NEW IN OCTOBER?</h2>
                    <p class="text-muted mb-4">
                        New month, new watches in the world's largest Watch Finder! Stay ahead of the watch game with October's hottest releases.
                    </p>
                    <a href="{{ url('/new-watches') }}" class="btn btn-dark rounded-0 px-4 py-2 fw-bold text-uppercase">
                        View All
                    </a>
                </div>

                <div class="col-lg-9">
                    <div id="newProductCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            
                            <div class="carousel-item active">
                                <div class="d-flex justify-content-around">
                                    @for ($i = 0; $i < 4; $i++)
                                        @include('components.product_card', ['brand' => 'BREITLING', 'model' => 'Lady Premier Superquarts', 'image' => 'watch_'. $i])
                                    @endfor
                                </div>
                            </div>

                            </div>
                        
                        <button class="carousel-control-prev" type="button" data-bs-target="#newProductCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#newProductCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="ads-section py-5 bg-light">
        <div class="container">
            <h3 class="text-center mb-4 fw-bold">Banner Quảng Cáo & Khuyến Mãi</h3>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="p-5 bg-white text-center shadow-sm" style="height: 200px;">
                        <h4>Banner Quảng Cáo Lớn (Chức năng 1.3)</h4>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-5 bg-white text-center shadow-sm" style="height: 200px;">
                        <h4>Khuyến Mãi Nổi Bật</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection