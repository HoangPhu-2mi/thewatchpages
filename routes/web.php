<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DangKy_DangNhapController;
use App\Http\Controllers\HomeController;

Route::middleware(['web'])->group(function () {

    Route::get('/', function () {
    return view('welcome');
})->name('welcome');

###############Sign Up - Login - Logout ###############
    Route::get('/register', [DangKy_DangNhapController::class, 'showForm'])->name('register.form');
    Route::post('/register', [DangKy_DangNhapController::class, 'register'])->name('register.post');

    Route::get('/login', [DangKy_DangNhapController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [DangKy_DangNhapController::class, 'login'])->name('login.post');

    Route::get('/forgot-password', [DangKy_DangNhapController::class, 'showForgotPasswordForm'])->name('password.form');
    Route::post('/forgot-password', [DangKy_DangNhapController::class, 'sendResetLink'])->name('password.email');

    Route::post('/logout', [DangKy_DangNhapController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('/account', fn() => view('account.index'))->name('account.details');
        Route::get('/brand-alerts', fn() => view('account.brand_alerts'))->name('brand.alerts');
        Route::get('/orders', fn() => view('account.orders'))->name('orders');
        Route::get('/address-book', fn() => view('account.address_book'))->name('address.book');
        Route::get('/returns-refunds', fn() => view('account.returns'))->name('returns.refunds');
    });
});

##########checkout routes##########
