<?php

use Illuminate\Support\Facades\Route;

// Tuyến đường (Route) mặc định cho trang chủ
Route::get('/', function () {
    // Thay vì trả về view 'welcome', chúng ta trả về view 'home'
    return view('home'); 
});

// Bạn cũng có thể thêm các route cơ bản khác để test layout:
/*
Route::get('/products', function () {
    // Tạm thời trả về trang chủ để test menu
    return view('home'); 
});

Route::get('/cart', function () {
    // Tạm thời trả về một view trống
    return view('cart'); 
});
*/