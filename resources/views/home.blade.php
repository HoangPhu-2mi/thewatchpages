@extends('layouts.app')

@section('title', 'The Watch Pages - Trang Chủ')

@section('content')

    <section class="hero-section">
        <div class="container-fluid p-0">
            <div class="row g-0 align-items-center" style="min-height: 633px; position: relative;">
                
                <div class="col-12 col-md-6 bg-dark text-white d-flex align-items-center justify-content-center p-5 p-md-0" style="min-height: 633px;">
                    <div class="container" >
                        <h1 class="display-6 fw-bold text-uppercase mb-4" style="line-height: 1.2;">
                            Explore The World's Largest Watch Finder
                        </h1>
                        <a href="{{ url('/finder') }}" class="btn btn-light btn-lg rounded-0 px-5 py-3 fw-bold text-uppercase">
                            Explore
                        </a>
                    </div>
                </div>
                <img src="{{ asset('images/dhtchu.png') }}" 
                    alt="Watch Main Image" 
                    class="img-fluid hero-watch-image position-absolute top-50 start-50 translate-middle" 
                    style="max-width: 300px; z-index: 10;"
                >
                <div class="col-12 col-md-6 bg-light d-flex flex-column align-items-center justify-content-center position-relative p-5">
                    <div class="text-center w-75 mx-auto ms-md-0 me-md-auto">
                        <h2 class="h3 fw-bold text-uppercase mb-4" style="line-height: 1.2;">
                            Shop Our Selection of Handpicked Watches
                        </h2>
                        <a href="{{ route('products.index') }}" class="btn btn-dark btn-lg rounded-0 px-5 py-3 fw-bold text-uppercase">
                            Shop Watches
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    
    <div class="container py-5">
        <h3 class="text-center">Các phần còn lại của trang chủ...</h3>
    </div>
    

@endsection