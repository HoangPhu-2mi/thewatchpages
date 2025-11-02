<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

// Tuyến đường (Route) mặc định cho trang chủ
Route::get('/', function () {
    // Thay vì trả về view 'welcome', chúng ta trả về view 'home'
    return view('home'); 
});



// Sản phẩm
Route::prefix('products')->controller(ProductsController::class)->group(function () {
    Route::get('/', 'index')->name('products.index');

    Route::get('/search', 'index')->name('products.search');

    Route::get('/search-suggest', 'searchSuggest')
    ->name('products.search.suggest');

    // Route::get('/favorite/{dspid}', 'favorite')->name('products.favorite');

    Route::get('/{dspid}/{spid}', 'show')
        ->where(['dong' => '.*', 'sanpham' => '.*'])
        ->name('products.show');

  
});
