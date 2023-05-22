<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [DashboardController::class, 'login'])->name('login');

Route::post('/login', [DashboardController::class, 'processLogin'])
        ->name('processLogin');

Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');


// y/c cần phải login
Route::group(['middleware'=>'islogin'], function() {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin');

    // xử lý cho role admin
    Route::group(['middleware'=>'isadmin', 'prefix'=>'admin', 'as'=>'admin.'], function() {
        Route::resource('/product', ProductController::class);
    });
});


